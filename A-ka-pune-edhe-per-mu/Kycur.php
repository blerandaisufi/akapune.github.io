<?php


session_start();



include('klasa.php');

$kycur = new Mesazhi("Jeni kycur me sukses!");


?>
<?php
            if(isset($_COOKIE['email']))
{}
else
{
    header("Location:kycja-kandidatit.php") ;
}
            include 'header.php';
?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">


    <a href="Kycur.php" class="logo logo-bg">
        
     
      <span class="logo-lg"><b>A ka pune edhe per mu ? </b></span>
    </a>
    <nav class="navbar navbar-static-top">

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="punet.php">Punet</a>
          </li>
          <li>
            <a href="rrethNesh.php">Rreth nesh</a>
          </li>
          <li>
            <a href="Ckycja.php">Ckycuni</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
    <span style="color:white; text-align:center;"><?php $kycur->getMessage(); ?></span>
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header bg-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center index-head">
            <h1>A ka pune edhe per mu ?</h1>
            <p>
               <?php
               //implementimi i leximit te fajllit
               $leximiFile = fopen("leximiFile-it.txt", "r") or die("Nuk mund te lexohet fajlli !");
               echo fgets($leximiFile);
               fclose($leximiFile);
               ?>
            
              </p>
              <p>Kerko pune nivel vendi(
              <?php
              echo substr("Shteti Kosove",6);
              echo ")";
              ?>
                
              
              </p>
            <p><a class="btn btn-success btn-lg" href="punet.php" role="button">Kerko</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
              <h1 class="text-center">
                  Jeni kycur  me  
                  
                  <?php
                  //implementimi i preg_replace
                  $string1="sukses";
                  $string2=preg_replace("/kerkuara/","kerkuara",$string1);
                  
                  echo $string2;
                  ?>
              </h1>
          
        

          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
           
        </div>
      </div></div>
    </section>


  </div>


 <?php include'footer.php'?>
    </body>
</html>

