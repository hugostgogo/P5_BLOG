<?php
namespace App\Models;

use PDO;

class Comment {
    public $id;
    public $post_id;
    public $content;
    public $author_id;
    public $is_active;
    public $created_at;

    function __construct($args) {
        $this->id = $args['id'];
        $this->post_id = $args['post_id'];
        $this->content = $args['content'];
        $this->author_id = $args['author_id'];
        $this->is_active = $args['is_active'];
        $this->created_at = $args['created_at'];

        return $this;
    }

    static function getAll () {
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $req = $db->prepare("SELECT * FROM comments");
        $req->execute();
        $all = $req->fetchAll();

        $result = array();
        foreach ($all as $comment) {
            array_push($result, new Comment($comment)); 
        }

        return $result;
    }

    static function getUnconfirmed () {
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $req = $db->prepare("SELECT * FROM comments WHERE is_active = 1");
        $req->execute();
        $all = $req->fetchAll();

        $result = array();
        foreach ($all as $comment) {
            array_push($result, new Comment($comment)); 
        }

        return $result;
    }

}