<?php 
$connect = mysqli_connect("localhost", "root", "", "examination_system");  
 if(!empty($_POST))  
 {  
      
       
      if($_POST["test_id"] != '')  
      {  
          
           $query = "  
           DELETE FROM test where  test_id='".$_POST["test_id"]."'
           "; 
      }  
      if(mysqli_query($connect, $query))  
      { 
      echo "Delete Successfully";
      } 
           
           
 }  
 ?>
 