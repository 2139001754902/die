<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'files/phpmailer/src/Exception.php';
require 'files/phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('');
$mail->addAddress('nicetab@mail.ru');
$mail->Subject = 'Разработка сайта';


if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['telephone']))){
    $body.='<p><strong>Telephone:</strong> '.$_POST['telephone'].'</p>';
}
if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Name:</strong> '.$_POST['message'].'</p>';
}


if (!$email->send()) {
    $message = 'Ошибка';
}else {
    $message = 'Данные отправлены!';
}
$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>