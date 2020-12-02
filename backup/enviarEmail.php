<?php

if(isset($_POST['email']) && !empty($_POST['email'])) {
      $nome = addcslashes($_POST['nome']);
      $email = addcslashes($_POST['emailUsuario']);
      $menssagem = addcslashes($_POST['menssagem']);
      $para = "ht.henrique.2.ht@gmail.com";
      $assunto = "Contato pelo site";

      $corpo = "Nome: ".$nome."\r\n".
               "E-mail: ".$email."\r\n".
               "Menssagem".$menssagem;

      $header  = 'MIME-Version: 1.0' ."\r\n";
      $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $header .= 'From: ht.henrique.2.ht@gmail.com'."\r\n"."Reply-To:".$email."\e\n"
                        ."X=Mailer:PHP/".phpversion();

      if(mail($para, $assunto, $corpo, $header)){
            echo("E-mail enviado com sucesso");
            header("location:javascript://history.go(-1)");
      }else{
            echo("E-mail não foi enviado");
      }
}


?>