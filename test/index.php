<?php

require __DIR__ . '/../lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email(2, "smtp.gmail.com", "tls", 587, "user@dominio.com.br", "123456", "daniel.baluch@lh.com.br", "User");
                                    //$smtpDebug, $host, $smtpSecure, $port, $user, $pass, $setFromEmail, $setFromName
$novoEmail->sendMail("Assunto de Teste","<p>Este é um e-mail de <b>teste</b>!</p>","user@dominio.com.br","User Name","destinatario@dominio.com.br","Destinatario");

var_dump($novoEmail);

