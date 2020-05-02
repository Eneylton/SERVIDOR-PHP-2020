<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/html; charset=utf-8");

include "library/connect.php";

require_once("PHPMailer/PHPMailerAutoload.php");

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['crud'] == 'enviar_email'){

    $nome = $postjson["nome"];
    $email = $postjson["email"];


$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "eneyltonservicos@gmail.com";
$mail->Password = "e1n2e3y4";

$mail->setFrom("eneyltonservicos@gmail.com", "Fica em Kasa");

$mail->addAddress($email);

$mail->Subject = "Obrigado por participar do nosso projeto...";

$mail->msgHTML("<html>de: Eneylton Barros <br/>email: eneylton@hotmail.com<br/><br/>Whatsapp:(98) 99158-1962<br/>mensagem: Obrigado {$nome} por participar do nosso projeto Fica em ksa...</html>");

$mail->AltBody = "de: Eneylton Barros\nemail:eneylton@hotmail.com\nmensagem: Parabéns seu cadastro foi aprovado...";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}
die();

    
    $result = json_encode(array('success'=>false));
    echo $result;

}

?>