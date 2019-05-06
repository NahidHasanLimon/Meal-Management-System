<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "examination_system");  
 if(isset($_POST["test_id"]))  
 {  
      $query = "SELECT * FROM subject a,class b,test c,level d where b.class_id=c.class_id AND a.subject_id=c.subject_id AND c.level_id=d.level_id AND test_id='".$_POST["test_id"]."'"; 
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>