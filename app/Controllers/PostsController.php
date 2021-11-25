<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Article;
use App\Models\User;


use App\Controllers\DB;

class PostsController extends BaseController
{

    public $fields = [
        'id',
        'title',
        'content',
        'chapo',
        'author_id',
        'is_active',
        'updated_at',
        'created_at'
    ];

    const model = Article::class;

    static function getLiked ()
    {
        $user = User::getLogged();

        $records = DB::select("SELECT * FROM posts INNER JOIN likes ON likes.likeable_id = posts.id WHERE likes.liker_id = $user->id", true);

        $posts = [];
        
        foreach($records as $record) array_push($posts, new Article($record));
            
        return $posts;
    }

    static function getOwned ($userId)
    {
        $records = DB::select("SELECT * FROM posts WHERE author_id = $userId", true);
        $posts = [];

        foreach($records as $record) {
            array_push($posts, new Article($record));
        }
            
        return $posts;
    }
}
