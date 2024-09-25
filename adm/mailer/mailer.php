<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require_once('../model/manager.class.php');

function gerarCodigoVerificacao($tamanho = 6) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
  
    for ($i = 0; $i < $tamanho; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
  
    return $codigo;
  }
  

function enviaremail($emailEnviar){

$email= $emailEnviar["email"];
$user = $emailEnviar["pessoa"];
$assunto = $emailEnviar["assunto"];



  $codigoVerificacao = gerarCodigoVerificacao(6);
  $manager = new Manager();
  $url = 'http://localhost/BECO/mailer/view/rec.php?cod=' . $codigoVerificacao;

  $emailBody = file_get_contents($url);
// Instância da classe
$mail = new PHPMailer(true);
try
{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->CharSet = 'UTF-8';
    $mail->Username = 'beco.br.contato@gmail.com';
    $mail->Password = 'jdcy vlth hdmk mdsc';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // or 465 for SSL
    $mail->setFrom('beco.br.contato@gmail.com', 'BECO Suporte');
    $mail->addAddress($email, $user);
    $mail->Subject = $assunto;
    $mail->isHTML(true);
    $mail->Body = $emailBody;


if (!$mail->send()) {

    return 0;
} else {
    
    $cod = $manager -> inserirCod($codigoVerificacao);}

    return 1;
}
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}

?>
