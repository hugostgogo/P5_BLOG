<?php

namespace App\Models;

use App\Models\Base;

use PHPMailer\PHPMailer\PHPMailer;

class Email extends Base
{
    const from = 'huglemoal@gmail.com';


    public $to;
    public $subject;
    public $message;

    public $headers;


    const fields = [
        "to",
        "subject",
        "message"
    ];

    function __construct($params)
    {
        $this->to = $params['to'];
        $this->subject = $params['subject'];
        $this->message = $params['message'];

        $this->headers  = 'MIME-Version: 1.0' . "\r\n";
        $this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $this->headers .= 'From: ' . self::from . "\r\n";

        return $this;
    }

    function send()
    {

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->isHTML();
        $phpmailer->Host =  config('SMTP.host');
        $phpmailer->SMTPAuth = config('SMTP.auth');
        $phpmailer->Port = config('SMTP.port');
        $phpmailer->Username = config('SMTP.username');
        $phpmailer->Password = config('SMTP.password');

        $phpmailer->setFrom('huglemoal@gmail.com', 'BLOG DE HUGO');
        $phpmailer->addAddress($this->to);

        $phpmailer->Subject = $this->subject;
        $phpmailer->Body    = $this->message;

        return $phpmailer->send();
    }
}
