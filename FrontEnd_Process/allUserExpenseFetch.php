<?php
 //fetch.php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/Database.php');
include_once ($filepath.'/../classes/User.php');
$db = new Database();
$usr= new User;

 if(isset($_POST["start_date"]))
 {
 	 $start_date=$_POST['start_date'];
 	  $output = '';
 	$result = $usr->find_all_user_expense($start_date);

 	if(!$result){
 		echo "No Expenses";

 	}
 	else
 	{
     $totalMeal=0;
      $output .= '
            <div class="table-responsive">
            <table class="table table-bordered">
            <td width="10%">Date</td>
            <td width="10%">Expense Amount</td>
            <td width="15%">Name</td>
            ';


      while($row = mysqli_fetch_array($result))
      {

        $output .= '
                <tr>

                     <td width="10%">'.$row["expenseDate"].'</td>
                       <td width="10%" class="text-bold">'.$row["expenseAmount"].'</td>
                       <td width="15%" class="text-bold">'.$row["name"].'</td>
                 </tr>
           ';



        }

        $output .= '
            <tr>

                     <td width="10%">Total Expense:</td>
                     <td class="text-info" width="15%">'.$_POST['totalExpenseAmount'].'</td>
                     <td class="text-info" width="10%">BDT</td>
          </tr>
           </table>

      </div>
      ';

      echo $output;
  }
 }
 ?>
