<?php
session_start();
if(isset($_COOKIE['email']))
{}
else
{
    header("Location:kycja-kandidatit.php") ;
}
include'header.php';
?>

    <script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "punet-ajax.php?q="+str, true);
        xmlhttp.send();
    }
    }
    </script>
<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <a href="Kycur.php" class="logo logo-bg">
                <span class="logo-lg">
                    <b>A ka pune edhe per mu ?</b>
                </span>
            </a>
            <nav class="navbar navbar-static-top">

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="lojaa.php">Loja</a>
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

        <div class="content-wrapper" style="margin-left: 0px;">

            <section class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
                            <?php
                            echo str_replace("kerkuara", "reja", "<h1>Punet me te kerkuara</h1> ");
                            ?>
                            <?php
                            echo str_replace("nr","50","Perafersisht 50 pune te reja postohen cdo dite!");
                            ?>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Kerko</span>
                                    <input name="search_text" id="search_text" placeholder="Kerko pune ... " class="form-control" onkeyup="showHint(this.value)" autocomplete="off"/>
                                </div>  <p>Sugjerimet: <span id="txtHint"></span></p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-md-9">
                <b>Rezultatet e kerkimit</b>
            </div>
            <div id="result"></div>
        </div>


        <!--AJAX-FACEBOOK WEB-API-->
        
        <div id="fb-root" data-width="800"></div>
        <script>
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

        <p style="text-align:center; color:white; font-weight:bold" >Ju mund te na ndiqni edhe ne facebook</p>
        <div>
            <div class="fb-page" style="margin-left: 400px" data-href="https://www.facebook.com/gjejpuneshpejte/" data-tabs="timeline" data-width="500" data-height="100" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/gjejpuneshpejte/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/gjejpuneshpejte/">A ka pune edhe per mu ? </a>
                </blockquote>
            </div>

        </div>



 <?php include'footer.php'?>
<!--ajax per searchlive-->
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"shfaq-punet.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<!--ajax per crud(create,read,update,delete)-->
<script type="text/javascript">
      $(document).ready(function(){
           load_data();
           $('#action').val("Insert");
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
                var firstName = $('#first_name').val();
                var lastName = $('#last_name').val();
               
              
                if(firstName != '' && lastName != '')
                {
                     $.ajax({
                          url:"action.php",
                          method:"POST",
                          data:new FormData(this),
                          contentType:false,
                          processData:false,
                          success:function(data)
                          {
                               alert(data);
                               $('#user_form')[0].reset();
                               load_data();
                          }
                     })
                }
                else
                {
                     alert("Ploteso te dy fushat..");
                }
           });
      });
</script>