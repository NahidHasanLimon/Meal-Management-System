<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();

 if(!empty($_POST))  
 {  
  
      
       
      if($_POST['meal_id'] != '')  
      { 
        $meal_id=$_POST['meal_id'];
         $result=$usr->delete_meal($meal_id);
           if(!$result){ 
            
        echo "Failed to Delete";
        
          }
          else{
          
                echo "Deleted Successfully";
          }
    }
      } 
           
           
 
 ?>
 