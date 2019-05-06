 
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
      $expenseAmount = $_POST["expenseAmount"];  
      $expenseDate = $_POST["datepicker"];  
      $expenseType = $_POST["expenseType"];  
   
      
     
      if($_POST['actionValue']=="update")
      {
         $expense_id = $_POST['expense_id'];  
      $result=$usr->update_expense($expense_id,$user_id,$expenseDate,$expenseAmount,$expenseType);
      
           if(!$result){ 
            echo 'Successfully updated';
            // echo $result;
        
          }
          else{
          
              echo 'Failed to update';
          }
    } else {

          $result=$usr->add_expense($user_id,$expenseDate,$expenseAmount,$expenseType);
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
 