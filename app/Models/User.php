<?php

namespace App\Models;

use App\COntrollers\DB;

use App\Mails\ResetPassword;

class User extends Base
{
    const card = '/app/Components/Cards/userCard.html.php';
    const form = '/app/Components/Forms/userForm.html.php';
    const label = 'Utilisateur';

    const table = 'users';

    const sortKeys = [
        'id' => 'id',
        'Pseudo' => 'nickname',
        'E-mail' => 'email',
        'Actif' => 'is_active',
        'Date de création' => 'created_at'
    ];


    public $id;
    public $nickname;
    public $email;
    public $password;
    public $avatar;
    public $is_active;
    public $role;
    public $created_at;

    function __construct($args)
    {
        $this->id = isset($args['id']) ? $args['id'] : '';
        $this->nickname = isset($args['nickname']) ? $args['nickname'] : '';
        $this->email = isset($args['email']) ? $args['email'] : '';
        $this->password = isset($args['password']) ? $args['password'] : '';
        $this->avatar = isset($args['avatar']) ? $args['avatar'] : '';
        $this->is_active = isset($args['is_active']) ? $args['is_active'] : '';
        $this->role = isset($args['role']) ? $args['role'] : 0;
        $this->created_at = isset($args['created_at']) ? $args['created_at'] : '';

        parent::__construct();

        return $this;
    }

    static function getAll()
    {
        $all = DB::select("SELECT * FROM users", true);

        $result = array();
        foreach ($all as $user) {
            array_push($result, new User($user));
        }

        return $result;
    }

    static function get($id = null)
    {
        if (isset($id)) {
            $user = DB::select("SELECT * FROM users WHERE id = $id", false);
            return new User($user);
        } else {
            return false;
        }
    }

    static function register($args)
    {
        // Validation
        $validation = array();

        if (isset($args['nickname']) && empty(trim($args['nickname']))) $validation += ["nickname" => "Veuillez saisir un pseudo"];
        if (isset($args['email']) && empty(trim($args['email']))) $validation += ["email" => "Veuillez saisir une adresse email"];
        if (isset($args['password']) && empty(trim($args['password']))) $validation += ["password" => "Veuillez saisir un mot de passe"];
        if (isset($args['password1']) && empty(trim($args['password1']))) $validation += ["password" => "Veuillez confirmer votre mot de passe"];
        if ((!isset($args['password']) OR !isset($args['password1'])) OR (trim($args['password']) !== trim($args['password1'])) ) $validation += ["password" => "Les mots de passe ne correspondent pas"];

        if (!empty($validation)) return ["errors" => $validation];
        else {
            // PASS HASH
            $args['password'] = password_hash($args['password'], PASSWORD_DEFAULT);
            unset($args['password1']);

            $registered = DB::insert('users', $args);

            $user = new User($args);
            return $registered;
        }
    }

    static function login(String $name, String $password)
    {
        // Validation
        $validation = array();

        if (empty(trim($name))) $validation += ["name" => "Veuillez saisir un pseudo ou une adresse mail"];
        if (empty(trim($password))) $validation += ["password" => "Veuillez saisir un mot de passe"];

        $exists = DB::select("SELECT * FROM users WHERE nickname = '$name' OR email = '$name'");

        if (!$exists && !empty(trim($name))) $validation += ["name" => "Cet utilisateur n'existe pas"];

        if (!empty($validation)) return ["errors" => $validation, "form" => ["name" => $name]];
        else {
            $user = new User($exists);

            $auth = password_verify($password, $user->password);
            if ($auth) {
                session_start();

                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $user->id;

                return $user;
            } else {
                $validation += ["password" => "Mot de passe incorrect"];
                return ["errors" => $validation, "form" => ["name" => $name]];
            }
        }
    }

    static function logout()
    {
        $_SESSION["loggedin"] = false;
        $_SESSION["id"] = NULL;
        session_destroy();
    }

    public static function isLogged()
    {
        return isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== false ? 1 : 0;
    }

    public static function isAdmin()
    {
        $user = self::getLogged();
        if ($user) return $user->role == 1;
        else return false;
    }

    public static function getLogged()
    {
        if (!isset($_SESSION["loggedin"])) $_SESSION["loggedin"] = false;
        else {
            if ($_SESSION["loggedin"]) {
                $userID = $_SESSION['id'];
                $user = new User(DB::select("SELECT * FROM users WHERE id = $userID", false));
                return $user;
            } else {
                return false;
            }
        }
    }

    public function resetPassword()
    {
        $reset = new ResetPassword($this->email);
        if (isset($reset->errors)) $result = $reset['errors'];
        else {
            $result = $reset->url;
            $email = new Email((Array) $reset);
            var_dump($email);
            $email->send();
        }
        
        return $result;
    }
}

// 