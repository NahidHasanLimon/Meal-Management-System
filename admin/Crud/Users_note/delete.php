<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();

 if(!empty($_POST))  
 {  
  if($_POST['users_note_id'] != '')  
      { 
        $users_note_id=$_POST['users_note_id'];
         $result=$usr->delete_users_note($users_note_id);
           if(!$result){ 
            
        echo "Failed to Delete";
        
          }
          else{
          
                echo "Deleted Successfully";
          }
    }
      } 
           
           
 
 ?>
 