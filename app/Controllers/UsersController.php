<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\User;


use App\Controllers\DB;

class UsersController extends BaseController
{

    public $fields = [
        'id',
        'nickname',
        'email',
        'password',
        'avatar',
        'is_active',
        'created_at'
    ];

    const model = User::class;


    static function resetPassword($id) {
        $user = DB::select("SELECT email FROM users WHERE id = $id", false);
        if ($user) {
            $user = new User($user);
            $url = $user->resetPassword();
            if (!isset($url["errors"])) return $url;
            else return array("errors" => $url["errors"]);
        }
        else {          
            return array("errors" => ["Aucun utilisateur trouvé !"]);
        }
    }

    // static function verifyCode($code) {
    // }
}
