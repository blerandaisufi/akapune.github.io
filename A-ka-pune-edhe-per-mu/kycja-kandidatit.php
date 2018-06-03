<?php

if(isset($_COOKIE['email']))
{
    header("Location:Kycur.php") ;
}
include'header.php';
?>

<body class="hold-transition login-page">


    <div class="login-box">
        <div class="login-logo">
            <a href="index.php" style="font-size:30px;">
                <b>A ka pune edhe per mu ?</b>
            </a>
        </div>

        <div class="login-box-body">



            <p class="login-box-msg">Kycja e kandidatit</p>

           



            <form method="post" action="KontrolloKycjenKandidate.php">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" id="email"
                        name="email" placeholder="Email" />
                    <span class="glyphicon glyphicon-envelope form-

control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control"
                        id="fjalekalimi" name="fjalekalimi" placeholder="Fjalekalimi" />
                    <span class="glyphicon glyphicon-lock form-control-

feedback"></span>
                </div>
                <div class="row">

                    <div class="col-xs-8">
                        <input type="checkbox" id="rememeber "
                            name="remember" />
                        <b>Ruaj</b>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary 

btn-block btn-flat"
                            value="kycu" name="kycu">
                            Kycu
                        </button>

                    </div>
                    

                </div>

                
             
            </form>


        </div>

    </div>




<?php include'footer.php'?>