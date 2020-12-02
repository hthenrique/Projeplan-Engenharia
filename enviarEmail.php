<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$nome = $_POST['Nome'];
$email = $_POST['EmailUsuario'];
$menssagem = $_POST['Menssagem'];
$para = "enge.wt@gmail.com";

$corpo = "\nNome: ".$nome."\r\n".
      "\nE-mail: ".$email."\r\n".
      "\nMenssagem: ".$menssagem;

$mail = new PHPMailer;
$mail->isSMTP(); 
 // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'enge.wt@gmail.com'; // email
$mail->Password = 'Bmbjdqhbm2097'; // password
$mail->setFrom($_POST['EmailUsuario'], $_POST['Nome']); // From email and name
$mail->addAddress($para, 'William Texeira'); // to email and name
$mail->Subject = 'Contato do Site';
$mail->msgHTML("<html>Nome: {$nome}<br>Email: {$email}<br><br>Menssagem:<br>{$menssagem}</html>"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';

$mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );

  if(!$mail->send()){
      echo "Mailer Error: " . $mail->ErrorInfo;
  }else{
      echo "<script>alert('Email enviado com sucesso')</script>";
      header(sprintf('location: %s', $_SERVER['https://wt-engenharia.000webhostapp.com']));
      exit;
  }
?>