<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();

 if(!empty($_POST))  
 {  
  if($_POST['rent_costs_id'] != '')  
      { 
        $rent_costs_id=$_POST['rent_costs_id'];
         $result=$usr->delete_rent_and_extra_costs($rent_costs_id);
           if(!$result){ 
            
        echo "Failed to Delete";
        
          }
          else{
          
                echo "Deleted Successfully";
          }
    }
      } 
           
           
 
 ?>
 