<?php

$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../../lib/Database.php');
    $db = new Database();

if(isset($_POST["user_id"]) && !empty($_POST["date"])){
    $date=$_POST["date"];
    $user_id=$_POST["user_id"];
    $query=" SELECT noOfMeal FROM meals WHERE mealDate =  '$date' AND user_id='$user_id' ";

    $result=$db->select($query);
     if(!$result){ 

        echo 'notExist';
    
      }
      else{
        // $rowcount=mysqli_num_rows($result);
        //   if($rowcount>0){

            echo 'exist';
          // }
          // else
          // {
          //   echo 'notExist';
    
          // }

            
             
         
      }
    
   }
?>