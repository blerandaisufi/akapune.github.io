<?php

include 'Perdoruesi.php';

?>

<?php
//te Perdoruesi eshte klasa per valididm 
$perdoruesi = new Perdoruesi();
if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['regjistrohu'])){
    $regj=$perdoruesi->regjistrimi($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>A ka pune edhe per mu?</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />

    <link rel="stylesheet" href="css/AdminLTE.min.css" />
    <link rel="stylesheet" href="css/_all-skins.min.css" />

    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
</head>
<body class="hold-transition skin-green sidebar-mini">
  
    <div class="wrapper">
        <header class="main-header">
            <a href="index.php" class="logo logo-bg">
                <span class="logo-lg">
                    <b>A ka pune edhe per mu ?</b>
                </span>
            </a>
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                        <li>
                            <a href="kycu.php">Kycuni</a>
                        </li>
                        <li>
                            <a href="regjistrohu.php">Regjistrohu</a>
                        </li>
                      
                    </ul>
                </div>
            </nav>
        </header>

        <div class="content-wrapper" style="margin-left: 0px;">

            <section class="content-header">
                <div class="container">
                    <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
                        <h1 class="text-center margin-bottom-20">
                            <!--qetu u perdor funksioni trim dhe printf-->
                            <?php

                            $str = "**Krijo nje profil,**";

                            echo trim($str,"****");

                            $nr = 20000.00;
                            printf(" behu pjese e %1\$u",$nr);
                            echo " kandidateve tjere!"

                            ?>

                        </h1>
                        <form method="POST" action="" enctype="multipart/form-data">

                            <div class="col-md-6 latest-job ">
                                <?php

                                if (isset($regj)){
                                    echo $regj;
                                }
                                ?>
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" id="emri" name="emri" placeholder="Emri *" />
                                </div> 
                                    <div class="form-group">
                                        <input class="form-control input-lg" type="text" id="mbiemri" name="mbiemri" placeholder="Mbiemri *" />
                                    </div>
                                   
                                
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Email *" />
                                    
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control input-lg" rows="4" id="aboutme" name="shtese" placeholder="Disa fjale rreth vetes *" ></textarea>
                                 
                             
                                </div>
                         
                               

                                <div class="form-group">
                                    <input class="form-control input-lg" type="password" id="fjalekalimi" name="fjalekalimi" placeholder="Fjalekalimi *"/>
                                   
                                    <p>
                                        Sigurohu qe fjalekalimi te permbaje se paku
                                        <?php
                                        echo strlen("12345678");
                                        echo" karaktere!";
                                        ?>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <button class="btn btn-flat btn-success" name="regjistrohu">Regjistrohu</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p></p>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer" style="margin-left: 0px;">
            <div class="text-center">
                <strong>
                    &copy; 2018
                    <a href="index.php">A ka pune edhe per mu ?</a>.
                </strong>
            </div>
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
</body>
</html>