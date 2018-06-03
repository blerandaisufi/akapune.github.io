<?php
session_start();

$email = mysqli_real_escape_string($db,$_POST['email']);
$fjalekalimi = mysqli_real_escape_string($db,$_POST['fjalekalimi']);

$fjalekalimi = base64_encode(strrev(md5($fjalekalimi)));

if(isset($_POST['kycu']))
{
    require 'konektimi.php';
    $email=$_POST['email'];
    $fjalekalimiH=$_POST['fjalekalimi'];
    $fjalekalimi = base64_encode(strrev(md5($fjalekalimiH)));
    $query=mysqli_query($db,'select * from perdoruesit where email="'.$email.'" and fjalekalimi="'.$fjalekalimi.'"');
    $res=mysqli_fetch_row($query);

    //shkruarja ne file
    if(!file_exists("kandidatetekycur.txt")){
        die("Fajlli nuk u gjet..");
    }
    else
    {
        $file=fopen("kandidatetekycur.txt","w+") or die("Fajlli nuk u gjet..");
        $s=$email.",".$fjalekalimi."\n";

        fputs($file,$s) or die("Te dhenat nuk jane shkruar..");
        fclose($file);
    }

    if($res)
    {
        if(isset($_POST['remember']))
        {
            setcookie('email',$email,time()+40);
            setcookie('fjalekalimi',$fjalekalimi,time()+40);
        }

        $_SESSION['email']=$email;
        setcookie('email',"$email",0);
        setcookie('fjalekalimi',"$fjalekalimi",0);
        header('Location:kycja-kandidatit.php');

    }
    else { echo '<h4 class="login-box-msg">Keni shtypur gabim userin ose passwordin <a href="kycja-kandidatit.php">Provo perseri !</h4><br>';}

    if($email==''&&$fjalekalimi=='')
    {
        echo '<h3 class="login-box-msg">Shkruani te gjitha fushat </h3><br>';
    }
}


?>
