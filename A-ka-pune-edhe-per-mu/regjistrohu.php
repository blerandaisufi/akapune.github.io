<?php

session_start();

if(isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
include 'header.php';
?>
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
                            <a href="rrethNesh.php">Rreth nesh</a>
                        </li>
                        <li>
                            <a href="kycu.php">Kycuni</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="content-wrapper" style="margin-left: 0px;">

            <section class="content-header">
                <div class="container">
                    <div class="row latest-job margin-top-50 margin-bottom-20">
                        <h1 class="text-center margin-bottom-20">Regjistrohu</h1>
                        <div class="col-md-12 latest-job ">
                            <div class="small-box bg-yellow padding-5">
                                <div class="inner">
                                    <h3 class="text-center">Regjistrimi i perdoruesit</h3>
                                </div>
                                <a href="regjistro-kandidat.php" class="small-box-footer">
                                    Regjistrohu
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php' ?>


