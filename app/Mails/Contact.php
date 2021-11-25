<?php

namespace App\Mails;

use App\Models\Email;

class Contact extends Email
{
    public $to = "huglemoal@gmail.com";

    public $subject;
    public $message;

    public function __construct($args)
    {
        $errors = [];


        if (isset($args['email']) && trim($args['email']) !== "" && $args['email']) $email = $args['email'];
        else $errors += ["email" => "Veuillez renseigner un E-mail"];

        if (isset($args['name']) && trim($args['name']) !== "" && $args['name']) $name = $args['name'];
        else $errors += ["name" => "Veuillez renseigner un Nom"];

        if (isset($args['message']) && trim($args['message']) !== "" && $args['message']) $message = $args['message'];
        else $errors += ["message" => "Veuillez entrer un message"];

        $this->headers  = 'MIME-Version: 1.0' . "\r\n";
        $this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


        $this->message = " 
            <html> 
            <head> 

            </head> 
            <body> 
                <div>
                    <h1 style='margin: 0;'>Nouveau mail de contact</h1>
                    <hr />
                    <div style='font-size: 1.3em'>
                        <p style='margin:0'><strong>$name</strong> - $email</p>
                        <p style='margin:0'>$message</p>
                    </div>
                </div>
            </body> 
            </html>";




        $this->subject = "Contact: $name";

        if (count($errors) > 0) return ["errors" => $errors];
    }
}
