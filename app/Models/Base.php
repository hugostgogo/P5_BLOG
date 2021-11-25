<?php
namespace App\Models;

use App\Controllers\DB;

class Base {

    public $formatedCreated;
    public $formatedUpdated;

    function __construct()
    {
        $this->formatedUpdated =  isset($this->updated_at) ? strftime("le %d/%m/%G à %R", strtotime($this->updated_at)) : 'Non défini';
        $this->formatedCreated = isset($this->created_at) ? strftime("le %d/%m/%G à %R", strtotime($this->created_at)) : 'Non défini';        
    }

}

