 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'../../../classes/User.php');
  $usr= new User();
  ?>
 <?php  
 // $connect = mysqli_connect("localhost", "root", "", "examination_system");  
 if(!empty($_POST))  
 
 {  
      $user_id =$_POST["user_id"];  
      $advancedAmount = $_POST["advancedAmount"];  
      $advancedDate = $_POST["datepicker"];  
       
   
      
     
      if($_POST['actionValue']=="update")
      {
         $advanced_payments_id = $_POST['advanced_payments_id'];  
      $result=$usr->update_advanced_payments($advanced_payments_id,$user_id,$advancedDate,$advancedAmount);
      
           if(!$result){ 
            // echo 'Successfully updated';
            echo $result;
        
          }
          else{
          
              echo 'Failed to update';
          }
    } else {

          $result=$usr->add_advanced_payments($user_id,$advancedDate,$advancedAmount);
           if(!$result){ 
            // echo 'Successfully Inserted';
            echo $result;
        
          }
          else{
          
              echo 'Failed to Insert';
          }
    }
  }
   
 ?>
 