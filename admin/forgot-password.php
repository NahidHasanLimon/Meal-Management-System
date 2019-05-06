<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Forgot Password</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script src="js/main.js"></script>
    <script src="signupJS/jquery.js"></script>
    <script type="text/javascript">

$(function(){
//for user registration
  $("#regsubmit").click(function(){

 
  var email=$("#email").val();
  var profile_name=$("#profile_name").val();
  
  
 
        
          var dataString ='profile_name='+profile_name+'&email='+email;

      
  //dataString is simply a variable
  
  //ajax start
      $.ajax({
      //body of ajax

      type:"POST",
      url:"ajaxCheckAdmin/getforgotpassword.php",
      data:dataString,
      //operation
      //success:function(data)
      success:function(data){


             $("#password").html(data);//where to show
             alert(data);


      }




      });

            return false;

  });

  //For User Login





});



  </script>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            <p>Enter your email address and Profile Name .</p>
          </div>
          <form action="" method="post">


           <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Your Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!-- <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> -->
                   <input type="email" id="email" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                </div>
              </div>
            </div>



  <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Enter Your Profile Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                 <!--  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> -->
                   <input type="text"  id="profile_name" class="form-control" placeholder="Enter Your Profile Name" required="required" autofocus="autofocus">
                </div>
              </div>
            </div>







            <!-- <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="email" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                <label for="email">Enter email address</label>
              </div>
            </div>
             <div class="form-group">
              <div class="form-label-group">
                <input type="text"  id="profile_name" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                <label for="profile_name">Enter Your Profile Name</label>
              </div>
            </div> -->
            <input type="submit"  id="regsubmit" class="btn btn-primary btn-block" value="Retrieve Password">
          </form>
          <span id="password"></span>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="login.php">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
