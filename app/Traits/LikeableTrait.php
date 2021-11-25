<?php
namespace App\Traits;

use App\Controllers\DB;
use App\Models\Like;

trait LikeableTrait {
    
    public $likes;
    public $likesCount;

    public function __construct () {
        $this->likes = $this->getLikes();
        $this->likesCount = count($this->likes);
    }

    public function like ($liker_id) {
        $model = get_called_class();
        
        $currentlike = [
            "liker_id" => $liker_id,
            "likeable_id" => $this->id,
            "likeable_type" => $model,
        ];

        $exists = !empty(array_filter($this->likes, function ($like) use ($currentlike) {            
            return new Like($currentlike) == $like;  
        }));

        $currentlike['likeable_type'] = implode("\\\\", explode("\\", $currentlike['likeable_type']));
        if (!$exists) return DB::insert('likes', $currentlike); 
        else return false;
    }

    public function getLikes () {
        $likes = [];

        $model = implode("\\\\", explode("\\", get_called_class()));

        if (isset($this->id)) $records = DB::select("SELECT * FROM `likes` WHERE `likeable_id` = $this->id AND `likeable_type` = '$model'", true);
        else $records = [];

        foreach ($records as $record) $likes[] = new Like($record);
        
        return $likes;
    }
}