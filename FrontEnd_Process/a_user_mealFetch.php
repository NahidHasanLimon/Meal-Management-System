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


   
      $result = $usr->find_user_all_meal($user_id,$startDate); 
      if(!$result){ 
    echo "No Meal Available";
    
      }
      else {
       $output = '';  
      $totalMeal=0; 
      $output .= '  
            <div class="table-responsive">  
            <table class="table table-bordered">
            <td width="20%">Date</td> 
            <td width="30%">No of Meal</td>
            ';  


      while($row = mysqli_fetch_array($result))  
      {  
       
        $output .= '  
                <tr>  
                     
                     <td width="20%">'.$row["mydate"].'</td>  
      
               
           ';  

        if ($row['noOfMeal']!=NULL) {
           $totalMeal=$totalMeal+$row['noOfMeal'];

          $output .= '
                     <td width="10%" class="text-bold">'.$row["noOfMeal"].'</td>  
                </tr>  
               
           '; 
        }
        else{
           $totalMeal=$totalMeal+0;

           $output .= '  
                     <td width="10%" class="text-danger">'.'0'.'</td>  
                    </tr>       
           '; 

        }
           
      }  
      $output .= '  
            <tr>  
                     
                     <td width="20%">Total Meal:</td> 
                     <td class="text-info" width="30%">'.$totalMeal.'</td>
          </tr>   
           </table>  
           
      </div>  
      ';  
      echo $output;  
 
  } 
   }
 ?>
