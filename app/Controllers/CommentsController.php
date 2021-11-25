<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\DB;
use App\Controllers\PostsController;

use App\Models\Comment;

class CommentsController extends BaseController{
    const model = Comment::class;

    static function getUnconfirmed () {
        $all = DB::select("SELECT * FROM comments WHERE is_active = 0", true);
        $result = array();
        foreach ($all as $comment) {
            $comment = new Comment($comment);
            $post = PostsController::getSingle($comment->post_id);
            
            $comment->post = $post;
            array_push($result, $comment); 
        }
        return $result;
    }
}
?>