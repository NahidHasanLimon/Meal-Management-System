<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();

 if(!empty($_POST))  
 {  
  
      
       
      if($_POST['user_id'] != '')  
      { 
        $user_id=$_POST['user_id'];
         $result=$usr-> delete_users($user_id);
           if(!$result){ 
            
        echo "Failed to Delete";
        
          }
          else{
          
                echo "Deleted Successfully";
          }
    }
      } 
           
           
 
 ?>
 