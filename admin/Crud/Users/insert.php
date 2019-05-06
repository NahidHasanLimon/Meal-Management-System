 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();
  ?>
 <?php  

 if(!empty($_POST))  
 
 {  
      $email = $_POST["email"];  
       
      $name = $_POST["name"];  

      $password = $_POST["password"];  

      $about = $_POST["about"];

   
      
     
      if($_POST['actionValue']=="update")
      {
       $user_id =$_POST["user_id"];  
      $result=$usr->update_users($user_id,$name,$email,$about,$password);

      // print_r($result);
      
           if($result){ 
            // echo 'Successfully updated';
            echo $result;
        
          }
          else{
          
              // echo 'Failed to update';
             echo $result;
          }
          
    } 

    else {

          $result=$usr->add_users($name,$email,$about,$password);
           if($result){ 
            // echo 'Successfully Inserted';
            echo $result;
        
          }
          else{
          
              // echo 'Failed to Insert';
             echo $result;
          }
    }
  }
   
 ?>
 