<?php
namespace App\Models;

use App\Controllers\PostsController;
use App\Controllers\DB;

use App\Controllers\UsersController;

use App\Traits\LikeableTrait as Likeable;

class Comment extends Base {


    const card = '/app/Components/Cards/commentCard.html.php';

    const table = 'comments';

    public $id;
    public $post_id;
    public $content;
    public $author_id;
    public $is_active;
    public $created_at;

    public $author;

    function __construct($args) {
        $this->id = isset($args['id']) ? $args['id'] : NULL;
        $this->post_id = isset($args['post_id']) ? $args['post_id'] : NULL;
        $this->content = isset($args['content']) ? $args['content'] : NULL;
        $this->author_id = isset($args['author_id']) ? $args['author_id'] : NULL;
        $this->is_active = isset($args['is_active']) ? $args['is_active'] : NULL;
        $this->created_at = isset($args['created_at']) ? $args['created_at'] : NULL;

        if (isset($this->author_id)) $this->author = UsersController::getSingle($this->author_id);


        parent::__construct();


        return $this;
    }

    public function activate () {
        $record = DB::update('comments', $this->id, [ "is_active" => 1 ]);
        return new Comment($record);
    }

}