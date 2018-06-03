<?php

session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>A ka pune edhe per mu ?</title>

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
                    <b>A ka pune edhe per mu ? </b>
                </span>
            </a>

            <nav class="navbar navbar-static-top">

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                    </ul>
                </div>
            </nav>
        </header>



        <div class="login-box">
            <div class="login-logo">
                <a href="index.php" style="font-size:30px;">
                    <b>APLIKO</b>
                </a>
            </div>

            <div class="login-box-body">

                <p class="login-box-msg">Ploteso:</p>


                <!--FORMA PER DERGIMIN E EMAIL-IT-->

                <form action="konfirmimiAplikimit.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Emri
                                </label>
                                <input type="text" class="form-control" id="name" name="aplikuesi_name" placeholder="Shkruaj emrin " required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" class="form-control" id="email" placeholder="Shkruj email-in" name="aplikuesi_email" required="required" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Eksperienca
                                </label>
                                <select id="e" name="eksperienca" class="form-control" required="required">
                                    <option value="na" selected="">Zgjedh :</option>
                                    <option value="0">Pa eksperience</option>
                                    <option value="1">Nje vit eksperience</option>
                                    <option value="more">Me shume se nje vit eksperience</option>
                                </select>
                            </div>
                        </div>
                  
                        <div class="col-md-12">
                            
                            <input type="submit" name="apliko" class="btn btn-primary pull-right" value="Apliko">

                        </div>
                    </div>

                </form>







            </div>

        </div>




            
          <?php include('footer.php'); ?>
        </div>
    </body>
</html>
