<?php

namespace App\Mails;

use App\Controllers\DB;

use App\Controllers\UsersController;
use App\Models\User;

class ResetPassword
{

    public $to;
    public $subject;
    public $message;

    public $user;
    public $user_id;
    public $code;
    public $url;
    public $used;

    public function __construct($email)
    {
        if (!isset($email)) return false;

        $errors = [];

        if (isset($email) && trim($email) !== "") {
            $this->to = $email;

            $user = self::getUserByEmail($this->to);
            if (!$user) $errors += ["user" => "Aucun Compte correspondant a cet email."];
            else {
                $this->user = $user;
                $this->user_id = $user->id;
            }
        }

        if (count($errors) > 0) return array("errors" => $errors);

        $this->code = self::generateCode();
        $this->url = self::generateUrl();


        $this->subject = self::getSubject();
        $this->message = self::getMessage($this->user, $this->code);



        if (count($errors) > 0) return ["errors" => $errors];
        else {
            DB::insert('password_resets', [
                "user_id" => $this->user_id,
                "code" => $this->code,
                "url" => $this->url
            ]);


            return $this;
        }
    }

    static function getSubject()
    {
        return "Mise à jour de mot de passe";
    }

    static function getMessage($user, $code)
    {
        $template = "
        <div class='container'>
            <div class='message'>
                Voici votre code à 6 chiffres à usage unique.
            </div>
            <span class='code'>$code</span>
        </div>";

        $template .= "
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

            .container {
                border-radius: 5px;
                background-color: #555555;
                color: white;
                padding: 10px;
                font-family: 'Roboto', sans-serif, 'Open Sans';

                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }

            .message {
                
            }

            .code {
                
            }
        </style>";
        return $template;
    }

    static function getUserByEmail(String $email)
    {
        $record = DB::select("SELECT * FROM `users` WHERE `email` = '$email'", false);
        if (!$record) return false;
        else return new User($record);
    }

    static public function generateCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 9; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    static public function generateUrl()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 50; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    static public function verifyCode($url, $code)
    {
        $errors = [];

        $reset = DB::select("SELECT * FROM password_resets WHERE url = '$url'");
        if (!$reset) $errors += ["url" => "Une erreur s'est produite."];
        else {
            if ($reset['code'] === trim($code)) {
                $isUsed = $reset['used'];
                if ($isUsed) {
                    $errors += ["code" => "Code déjà utilisé."];
                } else {
                    DB::update('password_resets', $reset['id'], ["used" => true]);
                    $result = true;
                }
            } else $errors += ["code" => "Code incorrect."];
        }


        if (count($errors) > 0) return ["errors" => $errors];
        return $result;
    }

    static public function retrieve($url)
    {
        $exists = DB::select("SELECT user_id FROM password_resets WHERE url = '$url'", false);

        if (!$exists) return false;
        else return UsersController::getSingle($exists['user_id']);
    }
}
