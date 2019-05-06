<?php 
$filepath = realpath(dirname(__FILE__));
  // include_once ($filepath.'../lib/Session.php');
  include_once ($filepath.'/classes/User.php');
  Session::checkAdminLogin(); 
  ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

 <!--   <script src="js/main.js"></script>
    <script src="signupJS/jquery.js"></script> -->
    
  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form  action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <!-- <label for="inputEmail">Email address</label> -->
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password"  name="password" class="form-control" placeholder="Password" required="required">
                <!-- <label for="inputPassword">Password</label> -->
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
             <span class="disable"  style="display: none"><h1>Disabled Account!! Warning!!</h1></span>
              <span class="empty" style="display: none "><h1>Field Must not be Empty</h1></span>
              <span class="error"  style="display: none"><h4>Email or password  do not matched</h4></span>

           <input class="btn btn-primary btn-block mt-3" type="submit" id="login_submit" value="Login" />
          </form>
          
         <!--  <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
          </div> -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
      <?php
      include_once ($filepath.'/../inc/scripts.php');
        ?>
        <script type="text/javascript">

   $(function(){
    //for user registration

      //For User Login
      $("#login_submit").click(function(){

       var email=$("#email").val();
       var password=$("#password").val();

      //dataString is simply a variable
      var dataString ='email='+email+'&password='+password ;
      //ajax start
          $.ajax({
          //body of ajax

          type:"POST",
          url:"Crud/Login/getlogin.php",
          data:dataString,
          //operation
          success: function(data){
            // alert(data);

                  if($.trim(data) == "empty") {
    //use #for id and dot(.) for class
                       $(".empty").show();

                       setTimeout(function(){

                        $(".empty").fadeOut();
                       },3000);


                  }


                  else if($.trim(data) == "error")
                  {
                    // alert("Email or password do not matched");
                          $(".error").show();
                          setTimeout(function(){

                         $(".error").fadeOut();
                       },3000);


                  }
                  else 
                     {
                      // alert("Succesfully Logged In ");
                      window.location="index.php";
                     }



          }




          });

                return false;

      });




    });


    </script>

  </body>

</html>
