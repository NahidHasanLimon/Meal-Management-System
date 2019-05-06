 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();
  ?>
 <?php  

 if(!empty($_POST))  
 
 {  
      $user_id = $_POST["user_id"];  
       
    
      $result=$usr->change_user_status($user_id);
      if ($result) {
       echo $result;
      }
      else{
        echo "Failed to Change Status";
      }

     
    }
  
   
 ?>
 