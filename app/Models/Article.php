<?php

namespace App\Models;

use App\Controllers\DB;

use App\Models\Comment;
use App\Models\Base;

use App\Traits\LikeableTrait as Likeable;

class Article extends Base
{
    use Likeable { Likeable::__construct as __lconstruct; }

    public $id;
    public $title;
    public $chapo;
    public $content;

    public $updated_at;
    public $created_at;

    public $comments;
    public $commentsCount;

    const card = '/app/Components/Cards/articleCard.html.php';
    const form = '/app/Components/Forms/articleForm.html.php';

    const label = 'Article';
    const table = 'posts';

    const sortKeys = [
        'Date de création' => 'created_at',
        'Titre' => 'title',
        'Contenu' => 'content',
        'Nombre de commentaires' => 'commentsCount',
        'Nombre de likes' => 'likesCount'
    ];

    function __construct($args)
    {
        $this->id = isset($args['id']) ? $args['id'] : NULL;
        $this->title = isset($args['title']) ? $args['title'] : NULL;
        $this->chapo = isset($args['chapo']) ? $args['chapo'] : NULL;
        $this->content = isset($args['content']) ? $args['content'] : NULL;

        $this->updated_at = isset($args['updated_at']) ? $args['updated_at'] : NULL;
        $this->created_at = isset($args['created_at']) ? $args['created_at'] : NULL;

        if (isset($this->id)) {
            $this->comments = $this->getComments();
            $this->commentsCount = count($this->comments);
        }

        parent::__construct();
        $this->__lconstruct();

        return $this;
    }

    function getComments()
    {
        $all = DB::select("SELECT * FROM comments WHERE post_id = $this->id AND is_active = 1", true);

        $result = array();

        if (count($all) > 0) {
            foreach ($all as $post) {
                array_push($result, new Comment($post));
            }
        }


        return $result;
    }
}
