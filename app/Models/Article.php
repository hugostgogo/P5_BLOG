<?php
namespace App\Models;

use PDO;
use App\Models\Comment;

class Article {

    public $id;
    public $title;
    public $content;
    public $created_at;

    public $comments;

    function __construct($args) {
        $this->id = $args['id'];
        $this->title = $args['title'];
        $this->content = $args['content'];
        $this->created_at = $args['created_at'];

        return $this;
    }

    static function get ($id = NULL) {
        if (isset($id)) {
            $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
            $req = $db->prepare("SELECT * FROM posts WHERE id = :id");
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $res = $req->fetch();

            return new Article($res);
        }
    }

    static function getAll () {
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $req = $db->prepare("SELECT * FROM posts");
        $req->execute();
        $all = $req->fetchAll();

        $result = array();
        foreach ($all as $post) {
            array_push($result, new Article($post)); 
        }

        return $result;
    }

    function getComments () {
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $req = $db->prepare("SELECT * FROM comments WHERE post_id = :id AND is_active");
        $req->bindParam(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        $all = $req->fetchAll();

        $result = array();
        
        foreach ($all as $post) {
            array_push($result, new Comment($post)); 
        }

        return $result;
    }

    static function getAllWithComments () {

        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $req = $db->prepare("SELECT * FROM posts");
        $req->execute();
        $all = $req->fetchAll();

        $posts = array();
        foreach ($all as $post) {
            array_push($posts, new Article($post)); 
        }

        
        foreach ($posts as $post) {
            $req = $db->prepare("SELECT * FROM comments WHERE post_id = :id AND is_active");
            $req->bindParam(':id', $post->id, PDO::PARAM_INT);
            $req->execute();
            $all = $req->fetchAll();

            $result = array();
        
            foreach ($all as $comment) {
                array_push($result, new Comment($comment)); 
            }

            $post->comments = $result;
        }

        return $posts;
    }
}

?>