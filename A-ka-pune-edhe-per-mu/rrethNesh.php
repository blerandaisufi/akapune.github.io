<?php  
//CRUD(create,read,update,delete) 
include 'crud.php';  
$object = new Crud();  
include'header.php';
?>

  
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
                    </ul>
                </div>
            </nav>
        </header>

        <div class="login-box">
            <div class="login-logo">
                <a href="index.php" style="font-size:20px;">
                    <b>Na dergoni sugjerimet ose pyetjet tuaja:</b>
                </a>
            </div>

            <div class="login-box-body">



                <p class="login-box-msg">Ploteso:</p>


                <!--FORMA PER DERGIMIN E EMAIL-IT-->

                <form action="klientiEmail.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Emri
                                </label>
                                <input type="text" class="form-control" id="name" name="client_name" placeholder="Shkruaj emrin " required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" class="form-control" id="email" placeholder="Shkruj email-in" name="client_email" required="required" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subjekti
                                </label>
                                <select id="subject" name="client_subject" class="form-control" required="required">
                                    <option value="na" selected="">Zgjedh njeren:</option>
                                    <option value="service">Pyetje</option>
                                    <option value="suggestions">Sugjerime</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Mesazhi
                                </label>
                                <textarea name="client_message" id="message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="Mesazhi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- ** bone input ** -->
                            <input type="submit" name="sendFeedback" class="btn btn-primary pull-right" value="Dergo">

                        </div>
                    </div>

                </form>

            </div>

        </div>

        <div class="content-wrapper" style="margin-left: 0px;">

            <section id="about" class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center latest-job margin-bottom-20">
                            <h1>Rreth nesh</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="img/browse.jpg" class="img-responsive" />
                        </div>

                        <div class="col-md-6 about-text margin-bottom-20">
                            <?php
                            $arr = array('Ka','pune','edhe','per','ty!');
                            echo implode(" ",$arr)."<br>";
                            $str = "Ka pune edhe per ty!";
                            print_r (explode(" ",$str));
                            ?>
                            <p>
                                "A ka pune edhe per mu ?" eshte portal qe lidh punekerkuesit
                me punedhenesit.Kandidatet e interesuar per pune mund te
                krijojne llogarite e tyre si dhe te kerkojne per pune.
                Po ashtu edhe punekerkuesit mund te krijojne llogarite e tyre
                dhe keshtu te gjejne personat adekuat per t'ua kryer punet.
                            </p>


                        </div>
                    </div>
                </div>
            </section>

        </div>

    <?php
    if(isset($_COOKIE['email']))
    {
    ?>
      <div class="container box">
        <h3 align="center">Komentet e perdoruesve te webfaqes</h3>
        <br/>
        <button type="button" name="add" class="btn btn-success" data-toggle="collapse" data-target="#user_collapse">Komento</button>
        <br />
        <br />
        <div id="user_collapse" class="collapse">
            <form method="post" id="user_form">
                <label>Emri :</label>
                <input type="text" name="emri" id="emri" class="form-control" />
                <br />
                <label>Komenti :</label>
                <input type="text" name="komenti" id="komenti" class="form-control" />
                <br />
                <div align="center">
                    <input type="hidden" name="action" id="action" />
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Komento" />
                </div>
                <br />
            </form>
        </div>
        <br />
        <div class="table-responsive" id="user_table"></div>
    </div>


            <?php
    }
    else
    {
        
            ?>
            <p style="color:white"><a href="kycja-kandidatit.php">KYCU PER TE KOMENTUAR !</a></p>
       <?php
       
    }
       ?>
       <?php include'footer.php'?>
        </div>
      </body>
     <script type="text/javascript">
      $(document).ready(function(){
           load_data();
           $('#action').val("Komento");
           $('#add').click(function(){
                $('#user_form')[0].reset();
                $('#button_action').val("Komento");
           });
           function load_data()
           {
                var action = "Load";
                $.ajax({
                     url:"action.php",
                     method:"POST",
                     data:{action:action},
                     success:function(data)
                     {
                          $('#user_table').html(data);
                     }
                });
           }
           $('#user_form').on('submit', function(event){
                event.preventDefault();
                var firstName = $('#emri').val();
                var lastName = $('#komenti').val();
                if(firstName != '' && lastName != '')
                {
                     $.ajax({
                          url:"action.php",
                          method:'POST',
                          data:new FormData(this),
                          contentType:false,
                          processData:false,
                          success:function(data)
                          {
                               alert(data);
                               $('#user_form')[0].reset();
                               load_data();
                               $("#action").val("Komento");
                               $('#button_action').val("Komento");
                          }
                     });
                }
                else
                {
                     alert("Ploteso te dy fushat");
                }
           }); 
           $(document).on('click', '.update', function () {
               var user_id = $(this).attr("id");
               var action = "Fetch Single Data";
               $.ajax({
                   url: "action.php",
                   method: "POST",
                   data: { user_id: user_id, action: action },
                   dataType: "json",
                   success: function (data) {
                       $('.collapse').collapse("show");
                       $('#emri').val(data.emri);
                       $('#komenti').val(data.komenti);
                       $('#button_action').val("Edit");
                       $('#action').val("Edit");
                       $('#user_id').val(user_id);
                   }
               });
           });
      });
      $(document).on('click', '.delete', function(){
          var user_id = $(this).attr("id");
          var action = "Delete";
          if(confirm("A jeni te sigurte ?"))
          {
              $.ajax({
                  url:"action.php",
                  method:"POST",
                  data:{user_id:user_id, action:action},
                  success:function(data)
                  {
                      alert(data);
                      load_data();
                  }
              });
          }
          else
          {
              return false;
          }
      });
      
</script>
