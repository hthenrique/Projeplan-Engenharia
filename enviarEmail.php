<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$nome = $_POST['Nome'];
$email = $_POST['EmailUsuario'];
$menssagem = $_POST['Menssagem'];
$para = "contato@projeplanengenharia.com.br";

$corpo = "\nNome: ".$nome."\r\n".
      "\nE-mail: ".$email."\r\n".
      "\nMenssagem: ".$menssagem;

$mail = new PHPMailer;
$mail->isSMTP(); 
 // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "mail.projeplanengenharia.com.br"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 465; // TLS only
$mail->SMTPSecure = 'ssl'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'contato@projeplanengenharia.com.br'; // email
$mail->Password = 'Will1991!'; // password
$mail->setFrom($_POST['EmailUsuario'], $_POST['Nome']); // From email and name
$mail->addAddress($para, 'Projeplan Engenharia'); // to email and name
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
      header ("location:index.php?mail=erro");
  }else{
      //echo "<script>alert('Email enviado com sucesso')</script>";
      header ("location:index.php?mail=sucesso");
      exit;
  }
?>