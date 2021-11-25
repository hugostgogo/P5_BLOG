<?php

namespace App\Models;

use App\Models\Base;
use App\Models\User;

class Like extends Base
{
    const table = 'likes';

    public $liker_id;
    public $likeable_id;
    public $likeable_type;
    
    public $liker;

    function __construct($like) {

        $this->liker_id = $like['liker_id'];
        $this->likeable_id = $like['likeable_id'];
        $this->likeable_type = $like['likeable_type'];

        $this->liker = $like['liker_id'] ? User::get($like['liker_id']) : NULL;

        return $this;
    }
}
