<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Register</title>

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

  var gender = $(".gender:checked").val();
  var full_name=$("#full_name").val();
  var profile_name=$("#profile_name").val();
  var email=$("#email").val();
  var password=$("#password").val();
  var confirmPassword=$("#confirmPassword").val();
  var mobileNo=$("#mobileNo").val();
  if (password!=confirmPassword) {
     alert("Password and Confirm Password Do not MAtched ");
  }
  else
  {
  
 
        
          var dataString ='full_name='+full_name+'&gender='+gender+'&mobileNo='+mobileNo+'&profile_name='+profile_name+'&password='+password+'&email='+email;

      
  //dataString is simply a variable
  
  //ajax start
      $.ajax({
      //body of ajax

      type:"POST",
      url:"ajaxCheckAdmin/getregister.php",
      data:dataString,
      //operation
      //success:function(data)
      success:function(data){


             $("#limon").html(data);//where to show
             // alert("successFully Registered");
             // window.location = 'login.php';


      }




      });

            return false;
}
  });

  //For User Login





});



  </script>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-8">
                  <div class="form-label-group">
                   Full Name<input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter Your name" required="required" autofocus="autofocus">
                    
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    Profile Name<input type="text" id="profile_name" name="profile_name" class="form-control" placeholder="Profile Name" required="">
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                Email<input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                   Password <input type="password" id="password" name="password"class="form-control" placeholder="Password" required="required">
                   
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    Confirm Password<input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">

                    
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-label-group">
                <br>
               &emsp;<input type="radio" class="gender" id="gender" name="gender" value="Male">Male
               &emsp;&emsp;<input type="radio" class="gender" id="gender" name="gender" value="Female">Female

              </div>
            </div>
               <div class="form-group">
              <div class="form-label-group">
               Mobile No<input type="number" id="mobileNo" name="mobileNo" class="form-control" placeholder="Email address" required="">
              </div>
            </div>

              
            </div>
             <input type="submit"  id="regsubmit" class="btn btn-primary btn-block" value="Signup">
          </form>
          <div class="text-center">
               <span id="limon"></span>
            <a class="d-block small mt-3" href="login.php">Login Page</a>
            <a class="d-block small" href="forgot-password.php">Forgot Password?</a>

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
