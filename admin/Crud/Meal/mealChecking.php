<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();
 ?>
 <?php 
 if(isset($_POST["user_id"]) && !empty($_POST["date"])){
 	$date=$_POST["date"];
 	$user_id=$_POST["user_id"];
 $result=$usr->meal_exist_or_not($date,$user_id);
 
 
  if($result){ 

  
        	$ok=$result->fetch_assoc();
    		echo  json_encode($ok);
    
      }
  
}
  ?>