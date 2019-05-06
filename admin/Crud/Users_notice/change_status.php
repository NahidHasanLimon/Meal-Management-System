 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();
  ?>
 <?php  

 if(!empty($_POST))  
 
 {  
      $notice_id = $_POST["notice_id"];  
       
    
      $result=$usr->change_notice_status($notice_id);
      if ($result) {
       echo $result;
      }
      else{
        echo "Failed to Change Status";
      }

     
    }
  
   
 ?>
 