<?php
session_start();

if (($email == $client_email and isset($_SESSION['user'])) or !isset($_SESSION['user']))
{
    include 'konektimi.php';
    require "PHPMailer-master\class.phpmailer.php";
    require_once('PHPMailer-master\class.smtp.php');


    $emri = $_POST['aplikuesi_name'];
    $email = $_POST['aplikuesi_email'];

    $mail = new PHPMailer;

   

    $mail->isSMTP();                                      //  mailer  SMTP
    $mail->Host = 'smtp.gmail.com';  //  SMTP servers
    $mail->SMTPAuth = true;                               //  SMTP autentifikimi
    $mail->Username = 'xheliliermira@gmail.com';                 // SMTP username
    $mail->Password = 'projekti2018';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // TLS enkriptimi
    $mail->Port = 587;                                    // TCP porti

    $mail->setFrom('xheliliermira@gmail.com', 'A ka pune per mu');
    $mail->addAddress($email,$emri);     // Add a recipient
    


    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Aplikim per pune';
    $mail->Body    = '
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <p>Pershendetje,<br><br><br><br>Aplikimi juaj eshte kryer me sukses, per me shume informata do ju njoftojme ne ditet ne vazhdim..<br><br>Ekipi i "A ka pune edhe per mu".<br><br>Gjithe te mirat!</p>
</body>
</html>';
    
    $mail->send();
   

   echo "<SCRIPT type='text/javascript'>
        alert('Aplikimi u krye me sukses, kontrolloni email-in tuaj!');
        window.location.replace(\"punet.php\");
    </SCRIPT>";
}
else
{
    echo "<SCRIPT type='text/javascript'>
        alert('Aplikimi nuk u be!');
        window.location.replace(\"punet.php\");
    </SCRIPT>";

}

?>