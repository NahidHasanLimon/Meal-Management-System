<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'../../../classes/User.php');
  $usr= new User();

 if(!empty($_POST))  
 {  
  
      
       
      if($_POST['expense_id'] != '')  
      { 
        $expense_id=$_POST['expense_id'];
         $result=$usr->delete_expense($expense_id);
           if(!$result){ 
            
        echo "Failed to Delete";
        
          }
          else{
          
                echo "Deleted Successfully";
          }
    }
      } 
           
           
 
 ?>
 