 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();
  ?>
 <?php  

 if(!empty($_POST))  
 
 {  
      $user_id =$_POST["user_id"];  
      $noOfMeal = $_POST["noOfMeal"];  
      $mealDate = $_POST["datepicker"];  
     
      if($_POST['actionValue']=="update")
      {
          $meal_id = $_POST["meal_id"];  
          $result=$usr->update_meal($meal_id,$user_id,$noOfMeal,$mealDate);
      
           if(!$result){ 
            echo 'Successfully updated';
            
        
          }
          else{
          
              echo 'Failed to update';
          }
    } else {

          $result=$usr->add_meal($user_id,$noOfMeal,$mealDate);
           if(!$result){ 
            echo 'Successfully Inserted';
           
        
          }
          else{
          
              echo 'Failed to Insert';
          }
    }
  }
   
 ?>
 