<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email{
    private $mail = \stdClass::class;
        
    public function __construct($smtpDebug, $host, $smtpSecure, $port, $user, $pass, $setFromEmail, $setFromName) {
       $this->mail = new PHPMailer(true);
       //Server settings
       $this->mail->SMTPDebug = $smtpDebug;         // Enable verbose debug output
        $this->mail->isSMTP();                                   // Send using SMTP
        $this->mail->Host = $host;                              // Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                       // Enable SMTP authentication
        $this->mail->SMTPSecure = $smtpSecure;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $this->mail->Port = $port;
        $this->mail->Username = $user;                      // SMTP username
        $this->mail->Password = $pass;                      // SMTP password
        $this->mail->CharSet = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML('true');
        $this->mail->setFrom($setFromEmail, $setFromName);
       
    }
    
    public function sendMail($subject, $body, $replyEmail, $replyName, $adressEmail, $adressName) {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;
        
        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($adressEmail, $adressName);
        
        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro ao enviar o email: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}
