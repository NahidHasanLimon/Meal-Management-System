<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();

 if(!empty($_POST))  
 {  
  if($_POST['notice_id'] != '')  
      { 
        $notice_id=$_POST['notice_id'];
         $result=$usr->delete_notice($notice_id);
           if(!$result){ 
            
        echo "Failed to Delete";
        
          }
          else{
          
                echo "Deleted Successfully";
          }
    }
      } 
           
           
 
 ?>
 