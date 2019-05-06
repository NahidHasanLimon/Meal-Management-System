 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'../../../classes/User.php');
  $usr= new User();
  ?>
 <?php  
 // $connect = mysqli_connect("localhost", "root", "", "examination_system");  
 if(!empty($_POST))  
 {  
      
  

      $subjectID =$_POST["subject"];  
      $classID = $_POST["class"]; 
      $levelID =$_POST["level"];  
      $testName = $_POST["testName"];
      $testID = $_POST["testID"]; 
       
      echo $classID;
      echo $subjectID;
      echo $levelID;
     echo $testName;
     echo  $testID;
     
      if($_POST["testID"] != '')  
      { 
      $add_test=$usr->add_test($testName,$classID,$subjectID,$levelID);
      }  
      else  
      {  
       $add_test=$usr->add_test($testName,$classID,$subjectID,$levelID);
      }  
     
         if($add_test==true) 
      {  
           $select_query = "SELECT * FROM test a,class b where a.class_id=b.class_id ORDER BY test_id DESC" ;  
           $result = mysqli_query($connect, $select_query);  
           
           while($row = mysqli_fetch_array($result))  
           {  
                $output= '

                     <tr>  <td>' . $row["test_id"] . '</td>
                          <td>' . $row["test_name"] . '</td> 
                          <td>' . $row["class_name"] . '</td> 
                          <td><input type="button" name="edit" value="Edit" id="'.$row["test_id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["test_id"] . '" class="btn btn-info btn-xs view_data" /></td> 
                          <td><input type="button" name="delete" value="delete" id="' . $row["test_id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
          
      }  
      echo $output;  
 }  
 ?>
 