 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();
  ?>
 <?php  
 // $connect = mysqli_connect("localhost", "root", "", "examination_system");  
 if(!empty($_POST))  
 
 {  
      $cost_type =$_POST["cost_type"];  
      $cost_amount = $_POST["cost_amount"];  
      $cost_date = $_POST["datepicker"];  
       
   
      
     
      if($_POST['actionValue']=="update")
      {
         $rent_costs_id = $_POST['rent_costs_id'];  
      $result=$usr->update_rent_and_extra_costs($rent_costs_id,$cost_type,$cost_date,$cost_amount);
      
           if(!$result){ 
            // echo 'Successfully updated';
            echo $result;
        
          }
          else{
          
              echo 'Failed to update';
          }
    } else {

          $result=$usr->add_rent_and_extra_costs($cost_type,$cost_date,$cost_amount);
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
 