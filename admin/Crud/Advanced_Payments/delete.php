<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'../../../classes/User.php');
  $usr= new User();

 if(!empty($_POST))  
 {  
  
      
       
      if($_POST['advanced_payments_id'] != '')  
      { 
        $advanced_payments_id=$_POST['advanced_payments_id'];
         $result=$usr->delete_advanced__payments($advanced_payments_id);
           if(!$result){ 
            
        echo "Failed to Delete";
        
          }
          else{
          
                echo "Deleted Successfully";
          }
    }
      } 
           
           
 
 ?>
 