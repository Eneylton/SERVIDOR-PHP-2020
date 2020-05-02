<?php

session_start();

$nome = 'eneylton';
$email = 'eneylton@hotmail.com';
$mensagem = 'teste de email';

require_once("PHPMailer/PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "eneyltonservicos@gmail.com";
$mail->Password = "e1n2e3y4";

$mail->setFrom("eneyltonservicos@gmail.com", "Teste de envio de email Eneylton Barros");

$mail->addAddress("eneyltonservicos@gmail.com");

$mail->Subject = "Email de contato do Usuário";

$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");

$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}
die();