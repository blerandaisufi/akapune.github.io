<?php


session_start();//e thirr funksionin global

session_destroy();//e bon disable sessionin
if(isset($_COOKIE['email']))
{
    $email=$_COOKIE['email'];

    setcookie('email', $email, time()-1);




echo "Jeni ckycur me sukses, kliko ketu per <a href='kycu.php'> tu kycur perseri..";



}
else
{
    echo "<h3>JU DUHET TE JENI TE KYCUR ,QE TE CKYCENI !!!!!!!!!</h3><a href='kycu.php'>Kycuni</a></br>";
    
            $str = "KYCUNI";
            $chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
            print_r($chars);

}
?>