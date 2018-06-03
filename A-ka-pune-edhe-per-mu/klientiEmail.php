<?php

session_start();

include 'DB.php';
require "PHPMailer-master\class.phpmailer.php";
require_once('PHPMailer-master\class.smtp.php');


$client_name = $_POST['client_name'];
$client_email = $_POST['client_email'];
$client_subject = $_POST['client_subject'];
$client_message = $_POST['client_message'];


if (($email == $client_email and isset($_SESSION['user'])) or !isset($_SESSION['user']))
{

    if($client_subject=='product'){
        
    }

    $mail = new PHPMailer;

    

    $mail->isSMTP();                                      //  mailer SMTP
    $mail->Host = 'smtp.gmail.com';  // SMTP server
    $mail->SMTPAuth = true;                               // SMTP autentifikimi
    $mail->Username = 'xheliliermira@gmail.com';                 // SMTP username
    $mail->Password = 'projekti2018';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // TLS enkriptimi
    $mail->Port = 587;                                    // TCP porti

    $mail->setFrom('xheliliermira@gmail.com', 'A ka pune edhe per mu');
    $mail->addAddress('xheliliermira@gmail.com', 'Ekipi A ka pune edhe per mu');     // pranuesi i Email
  


    $mail->isHTML(true);                                  // email-i ne formatin HTML

    $mail->Subject = $client_subject;
    $mail->Body    = "<html>
	  <head>
		<meta charset=\"utf-8\">
	  </head>
	  <body>
		<p>Sent by $client_name: $client_email </p>
		<br>
		<hr>
		<p>$client_message</p>
	  </body>
	</html>";


    $mail->send();
    $rand="";
    $file="sugjerimet.txt";//shkruarja ne file
    $takeit=file_get_contents($file);
    if(strpos($takeit,":")==false)
    {
        $saved=$client_name.":".$client_message;
        file_put_contents($file,$saved,FILE_APPEND);
    }
    else
    {
        $savedd="\r\n".$client_name.":".$client_message;
        file_put_contents($file,$savedd,FILE_APPEND);

    }

    echo "<SCRIPT type='text/javascript'>
        alert('Mesazhi u dergua, faleminderit per kontributin tuaj!');
        window.location.replace(\"rrethNesh.php\");
    </SCRIPT>";
}
else
{
    echo "<SCRIPT type='text/javascript'>
        alert(' Ju lutem shkruani email-in e sakte! ');
        window.location.replace(\"rrethNesh.php\");
    </SCRIPT>";
}

