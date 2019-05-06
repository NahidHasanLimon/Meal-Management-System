 <?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../../lib/Database.php');
include_once ($filepath.'/../classes/User.php');
$db = new Database();
$usr= new User;

 if(isset($_POST["user_id"]))  
 {  
    $user_id=$_POST['user_id'];
    $startDate=$_POST['start_date'];
    $total_user_count=$usr->user_count();
    // print_r($total_user_count);

    $result = $usr->a_user_all_receipt_details($startDate,$user_id)->fetch_assoc();
    $today = date("d/m/Y"); 
    

      if(!$result){ 

      echo "No Data Available";
    
      }
      else {
         $user_name=$result["name"];
        //Satrt Meal Details
          $TotalExpenseAmount=$result["TotalExpenseAmount"];
          $TotalMealCount=$result["TotalMealCount"];
          $mealRate=round($result["mealRate"], 2);
          $user_meal=$result["meal"];
          $user_meal_cost=round($result["expense"],2);
          $user_meal_remaining_amount=round($result["remaining_meal_amount"],2);
          //End Meal Details

          // Start Rent and Cost
          $rent_total = $result["rent_total"];
          $utility_total = $result["utility_total"];
       
          $extra_total = $result["extra_total"];

          $per_user_rent = (($rent_total)/$total_user_count);
          $per_user_utility = (($utility_total)/$total_user_count);
          $per_user_extra = (($extra_total)/$total_user_count);

          $per_user_total_rent_utility_cost = ($per_user_rent+$per_user_utility+$per_user_extra);

          //End Rent and Cost

          //Overall Payable
          $user_advanced=$result["advanced"];

          $user_payable=floor((( $per_user_total_rent_utility_cost) - ($user_meal_remaining_amount) ) );

            
          // print_r($per_user_total_rent_utility_cost);

          // print_r($user_meal_remaining_amount);

          // print_r($user_payable);



       $output = '';  
      $output .= '  
         <div class="row">
                <div class="col-xs-8 col-sm-8 col-sm-8">
                    <address>
                    <strong>'.$user_name.'</strong> <br>
                <em>Mirpur,Dhaka,Bangladesh</em> </br>
                <em>'.date('F , Y', strtotime($startDate)).'</em>
              </address>
                </div>
                <div class="col-xs-4 col-sm-4 col-sm-4 text-right">
                    <p>
                  Printing Date <em>'.$today.'</em> </br>

                    </p>
                    <p>
                      
                    </p>
                </div>

            </div>
         
            <div class="row">
                 <ul>
                <li>Total Expense : '.$TotalExpenseAmount.'</li> 
                <li>Total Meal : '.$TotalMealCount.'</li>
                <li>Meal Rate : '.$mealRate.'</li>
                <li>Your Meal : '.$user_meal.'</li>
                   <li>Total Rent : '.$rent_total.'</li>
                <li>Total Utility : '.$utility_total.'</li>
                <li>Total Extra : '.$extra_total.'</li>
                  </ul>

               </div>


         <div class="row">
              <div class="text-center" >
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Payment Type</th>
                          
                            <th class="text-center">Amount</th>
                            <th class="text-center">Amount</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                  <tr>   
              <td class="col-sm-9"><em>Meal Cost:</em></h4></td>
           <td class="col-sm-1" style="text-align: center"></td>
             <td class="col-sm-1 text-center">'.$user_meal_cost.'</td>
                </tr>

                <tr>
              <td class="col-sm-9"><em> Advanced :</em></h4></td>
            <td class="col-sm-1" style="text-align: center"><b> - </b></td>
             <td class="col-sm-1 text-center">'.$user_advanced.'</td>
             </tr>  

             <tr>
              <td class="col-sm-9"></h4></td>
            <td class="col-sm-1" style="text-align: center"><b>Subtotal:</b></td>
             <td class="col-sm-1 text-center">'.$user_meal_remaining_amount.'</td>
             </tr> 

              <tr>
             <td class="col-sm-9"><em> Rent :</em></h4></td>
            <td class="col-sm-1" style="text-align: center"><b> + </b></td>
             <td class="col-sm-1 text-center">'.$per_user_rent.'</td>
             </tr>

              <tr>
             <td class="col-sm-9"><em> Utility :</em></h4></td>
            <td class="col-sm-1" style="text-align: center"><b> + </b></td>
             <td class="col-sm-1 text-center">'.$per_user_utility.'</td>
             </tr>
              <tr>
             <td class="col-sm-9"><em> Extra  :</em></h4></td>
            <td class="col-sm-1" style="text-align: center"><b> + </b></td>
             <td class="col-sm-1 text-center">'.$per_user_extra.'</td>
             </tr>
                       
                   <tr>
                    
                        <td>   
                        </td>
                            <td class="text-right"><h4><strong>Total:</strong></h2></td>
                            <td class="text-center text-danger"><h3><strong>'.$user_payable.'/=</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
           
 ';  
     
      echo $output;  
 
  } 
   }
 ?>
