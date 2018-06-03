<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Loja TICTACTOE</title>
    <style>
        #box {
            background-color: #c3ccb5;
            border: 3px solid #008000;
            width: 100px;
            height: 100px;
            font-size: 70px;
            text-align: center;
        }

        #go {
            width: 150px;
            height: 50px;
            background-color: #cddc39;
            font-size: 20px;
        }

        #again {
            width: 200px;
            height: 50px;
            background-color: #cddc39;
            font-size: 20px;
        }
    </style>
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
        <?php

        $fituesi='n';
        $box=array('','','','','','','','','');
        if(isset($_POST['submitbtn'])){
            $box[0]=$_POST["box0"];
            $box[1]=$_POST["box1"];
            $box[2]=$_POST["box2"];
            $box[3]=$_POST["box3"];
            $box[4]=$_POST["box4"];
            $box[5]=$_POST["box5"];
            $box[6]=$_POST["box6"];
            $box[7]=$_POST["box7"];
            $box[8]=$_POST["box8"];

            if(($box[0]=='x' && $box[1]=='x' && $box[2]=='x') ||
            ($box[3]=='x' && $box[4]=='x' && $box[5]=='x') ||
            ($box[6]=='x' && $box[7]=='x' && $box[8]=='x') ||
            ($box[0]=='x' && $box[3]=='x' && $box[6]=='x')  ||
            ($box[2]=='x' && $box[6]=='x' && $box[8]=='x') ||
            ($box[2]=='x' && $box[4]=='x' && $box[6]=='x') ||
            ($box[1]=='x' && $box[4]=='x' && $box[7]=='x') ||
            ($box[2]=='x' && $box[5]=='x' && $box[8]=='x') ||
            ($box[0]=='x' && $box[6]=='x' && $box[8]=='x')){
                $fituesi='x';
                print("<div class='alert alert-success'>X eshte fituesi i lojes !</div>");
            }
            $zbrazet=0;
            for($i=0;$i<=8;$i++){
                if($box[$i] == ''){
                    $zbrazet=1;
                }
            }
            if($zbrazet==1 && $fituesi=='n'){
                $i=rand() % 8;
                while($box[$i] != ''){
                    $i= rand() %8;
                }

                $box[$i]='o';
                if(($box[0]=='o' && $box[1]=='o' && $box[2]=='o') ||
                ($box[3]=='o' && $box[4]=='o' && $box[5]=='o') ||
                ($box[6]=='o' && $box[7]=='o' && $box[8]=='o') ||
                ($box[0]=='o' && $box[3]=='o' && $box[6]=='o')  ||
                ($box[2]=='o' && $box[6]=='o' && $box[8]=='o') ||
                ($box[2]=='o' && $box[4]=='o' && $box[6]=='o') ||
                ($box[1]=='o' && $box[4]=='o' && $box[7]=='o') ||
                ($box[2]=='o' && $box[5]=='o' && $box[8]=='o') ||
                ($box[0]=='o' && $box[6]=='o' && $box[8]=='o')){
                    $fituesi='o';
                    print("<div class='alert alert-danger'>O eshte fituesi i lojes !</div>");
                }
            }else if($fituesi=='n'){
                $fituesi='t';
                print("<div class='alert alert-danger'>Loja perfundoi pa fitues !!! </div>");
            }
        }

        ?>
        <div bgcolor="green" align="center">
            <form name="tictactoe" action="lojaa.php" method="post">
                <?php
    for($i=0;$i<=8;$i++){
        printf('<input type="text" name="box%s" value="%s" id="box" autocomplete="off">',$i,$box[$i]);
        if($i==2 || $i==5||$i==8){
            print('</br>');
        }
    }
    if($fituesi=='n'){
        print('</br><input type="submit" name="submitbtn" value="LUAJ" id="go">');
    }
    else{
        print('</br><input type="submit" name="newgamebtn" value="LUAJ PERSERI" id="again"
onclick="window.location.href=\"lojaa.php\'">');
    }
                ?>
</form>
        </div> 
    </div>
<?php include'footer.php'?>
    </body>
</html>
