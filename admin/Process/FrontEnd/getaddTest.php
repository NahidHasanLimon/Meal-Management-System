<?php
//Include database configuration file
include('../../../dbConfig.php');
$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'../../lib/Session.php');
    include_once ($filepath.'../../classes/User.php');
    $usr= new User();
   
if(isset($_POST["classID"]) && !empty($_POST["classID"])){
    echo $_POST['classID'];
    //Get all state data
    $query = $db->query("SELECT * FROM subject WHERE class_id = ".$_POST['classID']." ORDER BY subject_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Subject</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>';
        }
    }else{
        echo '<option value="">Subject Not not available</option>';
    }
}


if(isset($_POST["subjectID"]) && !empty($_POST["subjectID"])){
    //Get all city data
    $query = $db->query("SELECT * FROM level");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display Level list
    if($rowCount > 0){
        echo '<option value="">Select Level</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['level_id'].'">'.$row['level_name'].'</option>';
        }
    }else{
        echo '<option value="">Level not available</option>';
    }
}
//New
// if($_SERVER['REQUEST_METHOD']=='POST'){

//     $classID=$_POST['classID'];
//     $subjectID=$_POST['subjectID'];
//     $level_id=$_POST['level'];
//     $test_name=$_POST['test_name'];
    
//     echo $classID;
//      echo $subjectID;
//       echo $level_id;
//       echo $test_name;

//      $add_test=$usr->add_test($test_name,$classID,$subjectID,$level_id);
   
   
// }

?>