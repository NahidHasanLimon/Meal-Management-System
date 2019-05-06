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
 	$result = $usr->find_all_users_advanced($start_date);

 	if(!$result){
 		echo "No Advanced Money";

 	}
 	else
 	{
     $totalMeal=0;
      $output .= '
            <div class="table-responsive">
            <table class="table table-bordered">
            <td width="15%">Name</td>
            <td width="10%">Advanced Amount</td>
            <td width="10%">Date</td>
            ';


      while($row = mysqli_fetch_array($result))
      {

        $output .= '
                <tr>

                     <td width="15%">'.$row["name"].'</td>
                       <td width="10%" class="text-bold">'.$row["advancedAmount"].'</td>
                       <td width="10%">'.$row["advancedDate"].'</td>
                 </tr>
           ';



        }

        $output .= '
            <tr class="text-info">

                     <td  width="15%">Total Advanced :</td>
                     <td  class="text-info" width="10%">'.$_POST['totalAdvanced'].'</td>
                     <td  width="10%">BDT :</td>
          </tr>
           </table>

      </div>
      ';

      echo $output;
  }
 }
 ?>
