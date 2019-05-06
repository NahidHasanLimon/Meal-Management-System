<?php
 $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../lib/Session.php');
	include_once ($filepath.'/../../lib/Database.php');
	include_once ($filepath.'/../../helpers/Format.php');


class User
{

 private $db;
 private $fm;

public function __construct()
   {
 $this->db = new Database();
 $this->fm = new Format();

  }



  public function AdminLogin($email,$password)
     {
        $password= $this->fm->validation($password);
        $email= $this->fm->validation($email);


        $email=mysqli_real_escape_string($this->db->link,$email);

          if($email =="" || $password == "") {
        //echo "<span class='error'> Filled Must Not be Empty</span>";
            echo "empty";
            exit();
      }


     else
     {       $password=mysqli_real_escape_string($this->db->link,$password);
            $loginQuery="SELECT * FROM admin WHERE Email='$email' AND Password='$password' ";
             $result= $this->db->select($loginQuery);

             if ($result !=false) {
              $rowcount=mysqli_num_rows($result);
               $login_value=$result->fetch_assoc();
               if($rowcount<=0){
                 //echo "Your Accound Has been Disabled...Contact With Admin.....";
                echo "disable";
                exit();
               }
           else
           {
           echo "success";
           Session::init();
           Session::set("adminLogin",true);
           Session::set("adminName",$login_value['adminName']);
           Session::set("AdminProfileName",$login_value['ProfileName']);
           Session::set("AdminEmail",$login_value['Email']);
           Session::set("adminId",$login_value['adminId']);


           }
         }
                   else {
                    echo "error";
                    exit();


                   }

             }

     }

//     public function admin_Registration($full_name,$profile_name,$email,$password,$mobileNo,$gender)
//    {
//    	  $full_name= $this->fm->validation($full_name);
//    	  $profile_name= $this->fm->validation($profile_name);
//    	  $email= $this->fm->validation($email);
//    	  $password= $this->fm->validation($password);
//       $mobileNo= $this->fm->validation($mobileNo);
//       $gender= $this->fm->validation($gender);

//      // $img_name= $this->fm->validation($img_name);

//    	  $full_name= mysqli_real_escape_string($this->db->link,$full_name);
//    	  $profile_name=mysqli_real_escape_string($this->db->link,$profile_name);
//    	  $email=mysqli_real_escape_string($this->db->link,$email);
//       $password=mysqli_real_escape_string($this->db->link,$password);
//       $mobileNo=mysqli_real_escape_string($this->db->link,$mobileNo);
//       $gender=mysqli_real_escape_string($this->db->link,$gender);


//     if ($full_name == "" || $profile_name =="" || $email =="" || $password == "" || $mobileNo == "" || $gender == "") {
//     	echo " Field Must Not be Empty";

//     	exit();
//     }
//     else if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

//     	 echo " Invalid Email Address";
//     	 exit();
//     }

//    else
//    {
//    $checkQueryEmail="SELECT * FROM admin WHERE Email='$email'";
//    $checkResultEmail=$this->db->select($checkQueryEmail);
// 	   if($checkResultEmail!=false)
// 	   {
// 	   	echo "Email Address Allready Exist";

// 	   	exit();
// 	   }
// 	   else {
//         $password=mysqli_real_escape_string($this->db->link,$password);
// 	   	  $insert_user_query="INSERT INTO admin(FullName,ProfileName,Email,Password,mobileNo,Gender,JoinedDate) VALUES ('$full_name','$profile_name','$email','$password','$mobileNo','$gender',NOW())";

//           $inserted_user_result=$this->db->insert($insert_user_query);
//           if ($inserted_user_result) {
//           		//echo "<span class='success'>Registered Successfully</span>";
//               echo "Successfully Registerd User";
//            //    $yourURL="login.php";
//            // echo ("<script>location.href='$yourURL'</script>");



// 	       	exit();
//           }
//          else {



//                   exit();


//                  }
// 	   }


//    }


//    }
//    //Update PRofile
//    public function user_update_profile($user_id,$full_name,$university_name,$email,$password,$Address,$mobileNo)
//    {

//        $full_name= $this->fm->validation($full_name);
//       $university_name= $this->fm->validation($university_name);
//       $email= $this->fm->validation($email);
//       $password= $this->fm->validation($password);
//       $Address= $this->fm->validation($Address);
//       $mobileNo= $this->fm->validation($mobileNo);
//      // $img_name= $this->fm->validation($img_name);

//       $full_name= mysqli_real_escape_string($this->db->link,$full_name);
//       $university_name=mysqli_real_escape_string($this->db->link,$university_name);
//       $email=mysqli_real_escape_string($this->db->link,$email);
//       $password=mysqli_real_escape_string($this->db->link,$password);
//       $Address=mysqli_real_escape_string($this->db->link,$Address);
//       $mobileNo=mysqli_real_escape_string($this->db->link,$mobileNo);

//         $insert_user_query=" UPDATE user SET full_name='$full_name',
//                                              university_name='$university_name',
//                                              email='$email',
//                                              password='$password',
//                                              Address='$Address',
//                                              mobileNo='$mobileNo'
//                                 WHERE  user_id ='$user_id'";




//             $inserted_user_result=$this->db->update($insert_user_query);

//           if ($inserted_user_result) {

//               echo "Successfully Updated User";
//               echo "<script>
//              window.location.href='userProfile.php';
//             alert('Successfully Updated Profile');
//             </script>";



//           exit();
//           }
//          else {



//                   exit();


//                  }
//      }
//      //Admin Forgot PAssword
//      public function AdminForgotPassword($email,$profile_name)
//      {
//  $profile_name= $this->fm->validation($profile_name);
//       $email= $this->fm->validation($email);
//       $profile_name=mysqli_real_escape_string($this->db->link,$profile_name);
//       $email=mysqli_real_escape_string($this->db->link,$email);
//       $loginQuery="SELECT * FROM admin WHERE Email='$email' AND ProfileName='$profile_name' ";
//              $result= $this->db->select($loginQuery);

//              if ($result !=false) {
//               $rowcount=mysqli_num_rows($result);
//                $login_value=$result->fetch_assoc();
//                if($rowcount<=0){
//                  //echo "Your Accound Has been Disabled...Contact With Admin.....";
//                 echo "Wrong Email OR  Profile Name ";
//                 exit();
//                }
//            else
//            {
//             $dataa= $login_value['Password'];
//               echo $dataa;

//            }

//      }
//    }






// Print Details Fetch
      public function a_user_all_receipt_details($startDate,$user_id)
   {
     $date = new DateTime($startDate);
     $start_date=$date->modify('first day of this month')->format('Y-m-d');


      $query="
      SELECT  
      try.id,try.name,try.meal,try.TotalExpenseAmount,try.TotalMealCount,try.mealRate,try.expense,try.advanced,try.remaining_meal_amount,try.utility_total,try.rent_total,try.total_cost,try.extra_total
 FROM 
 (
 SELECT u.id,u.name,IFNULL(TotalExpenseAmount,0)as TotalExpenseAmount,
  IFNULL(TotalMealCount,0)as TotalMealCount ,
  IFNULL(MealCount,0) as meal,
  IFNULL((expense.TotalExpenseAmount / meals.TotalMealCount),0) as mealRate,
  IFNULL(((expense.TotalExpenseAmount / meals.TotalMealCount) * MealsPerUser.MealCount),0) as expense,
  IFNULL(userTotal_Advanced.total_advanced_amount,0) as advanced,
  IFNULL(IFNULL(userTotal_Advanced.total_advanced_amount,0)-IFNULL(expense.TotalExpenseAmount,0) / IFNULL(meals.TotalMealCount,0) * IFNULL(MealsPerUser.MealCount,0),0) as remaining_meal_amount,
  IFNULL(All_user_Total_AdvancedAmount,0)as All_user_Total_AdvancedAmount,
     
  IFNULL(TotalCosts,0)as total_cost, 
  IFNULL(utility_total,0) as utility_total ,IFNULL(rent_total,0) as rent_total ,
  IFNULL(extra_total,0) as extra_total
     
        FROM users u
       CROSS JOIN (SELECT SUM(e.expenseamount) AS TotalExpenseAmount
                FROM expenses e
               WHERE e.expensedate >= '$start_date' + INTERVAL 0 MONTH AND e.expensedate < '$start_date' + INTERVAL 1 MONTH
           ) expense
     
      CROSS JOIN (SELECT  SUM(cost.cost_amount) AS TotalCosts,
                  sum(case when cost.cost_type ='utility' then cost.cost_amount else 0 end) as utility_total,
              sum(case when cost.cost_type = 'rent' then cost.cost_amount else 0 end) as rent_total,
               sum(case when cost.cost_type = 'extra' then cost.cost_amount else 0 end) as extra_total

                  
                FROM rent_and_extra_costs cost
               WHERE cost.cost_date >= '$start_date' + INTERVAL 0 MONTH AND cost_date < '$start_date' + INTERVAL 1 MONTH
           ) costs
     
        CROSS JOIN (SELECT SUM(adv.advanced_amount) AS      All_user_Total_AdvancedAmount
               FROM advanced__payments adv
              WHERE adv.advanced_date >= '$start_date' + INTERVAL 0 MONTH AND adv.advanced_date < '$start_date' + INTERVAL 1 MONTH
          ) AllUserTotalAdvanced

       CROSS JOIN (SELECT SUM(m.noofmeal) AS TotalMealCount
                FROM meals m
               WHERE m.mealdate >= '$start_date' + INTERVAL 0 MONTH AND m.mealdate < '$start_date' + INTERVAL 1 MONTH
           ) meals
        LEFT JOIN (SELECT m.user_id, SUM(m.noofmeal) AS MealCount
                FROM meals m
               WHERE m.mealdate >= '$start_date' + INTERVAL 0 MONTH AND m.mealdate < '$start_date' + INTERVAL 1 MONTH
               GROUP BY m.user_id
           ) MealsPerUser
          ON MealsPerUser.user_id = u.id
          LEFT JOIN (SELECT ut.user_id, SUM(ut.advanced_amount) AS total_advanced_amount
                FROM advanced__payments ut
                    WHERE  ut.advanced_date >= '$start_date' + INTERVAL 0 MONTH AND ut.advanced_date<'$start_date' + INTERVAL 1 MONTH
               GROUP BY ut.user_id
           ) userTotal_Advanced
          ON userTotal_Advanced.user_id = u.id
       ORDER BY u.id
     ) try 
     WHERE try.id='$user_id' ";
      $result=$this->db->class_select_option($query);
       return $result;


}

// Print Details Fetch

//Selct options Query
    public function meal_exist_or_not($date,$user_id)
   {
      $query=" SELECT noOfMeal,id FROM meals WHERE mealDate =  '$date' AND user_id='$user_id' ";
      $result=$this->db->class_select_option($query);
       return $result;


}
//    public function meal_select($meal_id)
//    {

//    $query= "SELECT noOfMeal FROM meals  where meal_id='$meal_id' ";
//      $result=$this->db->class_select_option($query);
//      return $result;

// }
   public function find_all_user_only_meal_details($startDate)
   {
    $now = new DateTime($startDate);
    $start_date= $now->format('Y-m').'-01';

    $query = "SELECT u.name,m.noOfMeal,m.mealDate,m.id as id,u.id as user_id
    FROM (
        SELECT *
	         FROM meals
    WHERE
    mealDate >= '$start_date' + INTERVAL 0 MONTH AND mealDate < '$start_date' + INTERVAL 1 MONTH
    ORDER BY user_id DESC )m
    CROSS JOIN users u
    ON m.user_id=u.id
    ORDER BY m.mealDate DESC ";
       $result=$this->db->class_select_option($query);
     return $result;


   }
   public function find_all_user_expense($startDate)
   {
     $date = new DateTime($startDate);
     $start_date=$date->modify('first day of this month')->format('Y-m-d');
     $end_date=$date->modify('last day of this month')->format('Y-m-d');
    $query = "SELECT
      u.id as user_id,u.name as name ,e.expenseAmount as expenseAmount,
      e.`expenseDate` as expenseDate,e.expenseType as expenseType,e.id
      FROM
      (
  SELECT expenseAmount,expenseDate,user_id,expenseType,id FROM
        expenses
       where
       expenseDate >= '$start_date' + INTERVAL 0 MONTH AND expenseDate < '$start_date' + INTERVAL 1 MONTH
       ORDER BY expenseDate DESC
)e
    LEFT JOIN users u ON u.id=e.user_id
    ORDER BY e.expenseDate ASC";
       $result=$this->db->select($query);
        // $rowcount=mysqli_num_rows($result);
        return $result;
   }
   public function find_all_users_advanced($startDate)
   {
   $date = new DateTime($startDate);
   $start_date=$date->modify('first day of this month')->format('Y-m-d');
   $end_date=$date->modify('last day of this month')->format('Y-m-d');
  $query = " SELECT
  u.id as user_id,u.name as name ,a.advanced_amount as advancedAmount,
  a.`advanced_date` as advancedDate,a.id as id
    FROM
    (
      SELECT *
      FROM
      advanced__payments
        WHERE advanced_date BETWEEN '$start_date' AND '$end_date'
        )a
    LEFT JOIN users u ON u.id=a.user_id ";
       $result=$this->db->select($query);
        // $rowcount=mysqli_num_rows($result);
        return $result;
   }
   public function delete_meal($meal_id)
      {
        // print_r($meal_id);

       $query="DELETE FROM meals WHERE id='$meal_id' ";
        $result = $this->db->delete($query);
        return $result;
      }
   public function delete_expense($expense_id)
      {
        // print_r($expense_id);
       $query="DELETE FROM expenses WHERE id='$expense_id' ";
        $result = $this->db->delete($query);
        return $result;
      }
   public function delete_advanced__payments($advanced_payments_id)
      {
        // print_r($payments_id);
       $query="DELETE FROM advanced__payments WHERE id='$advanced_payments_id' ";
        $result = $this->db->delete($query);
        return $result;
      }
   public function delete_rent_and_extra_costs($rent_costs_id)
      {
        // print_r($payments_id);
       $query="DELETE FROM rent_and_extra_costs WHERE   id='$rent_costs_id' ";
        $result = $this->db->delete($query);
        return $result;
      }

   public function getAllUser_BY_ORDER()
   {
      $query = "SELECT * FROM users
       ORDER BY id asc";
       $result=$this->db->class_select_option($query);
      return $result;
   }

   public function find_all_user_meal_details($startDate)
   {
     $date = new DateTime($startDate);
     $start_date=$date->modify('first day of this month')->format('Y-m-d');
     $end_date=$date->modify('last day of this month')->format('Y-m-d');

    $query= "SELECT u.id,u.name,IFNULL(TotalExpenseAmount,0)as TotalExpenseAmount,
  IFNULL(TotalMealCount,0)as TotalMealCount ,
  IFNULL(MealCount,0) as meal,
  IFNULL((expense.TotalExpenseAmount / meals.TotalMealCount),0) as mealRate,
  IFNULL(((expense.TotalExpenseAmount / meals.TotalMealCount) * MealsPerUser.MealCount),0) as expense,
  IFNULL(userTotal_Advanced.total_advanced_amount,0) as advanced,
  IFNULL(IFNULL(userTotal_Advanced.total_advanced_amount,0)-IFNULL(expense.TotalExpenseAmount,0) / IFNULL(meals.TotalMealCount,0) * IFNULL(MealsPerUser.MealCount,0),0) as remaining,
  IFNULL(All_user_Total_AdvancedAmount,0)as All_user_Total_AdvancedAmount
        FROM users u
       CROSS JOIN (SELECT SUM(e.expenseamount) AS TotalExpenseAmount
                FROM expenses e
               WHERE e.expensedate >= '$start_date' + INTERVAL 0 MONTH AND e.expensedate < '$start_date' + INTERVAL 1 MONTH
           ) expense
        CROSS JOIN (SELECT SUM(adv.advanced_amount) AS      All_user_Total_AdvancedAmount
               FROM advanced__payments adv
              WHERE adv.advanced_date >= '$start_date' + INTERVAL 0 MONTH AND adv.advanced_date < '$start_date' + INTERVAL 1 MONTH
          ) AllUserTotalAdvanced

       CROSS JOIN (SELECT SUM(m.noofmeal) AS TotalMealCount
                FROM meals m
               WHERE m.mealdate >= '$start_date' + INTERVAL 0 MONTH AND m.mealdate < '$start_date' + INTERVAL 1 MONTH
           ) meals
        LEFT JOIN (SELECT m.user_id, SUM(m.noofmeal) AS MealCount
                FROM meals m
               WHERE m.mealdate >= '$start_date' + INTERVAL 0 MONTH AND m.mealdate < '$start_date' + INTERVAL 1 MONTH
               GROUP BY m.user_id
           ) MealsPerUser
          ON MealsPerUser.user_id = u.id
          LEFT JOIN (SELECT ut.user_id, SUM(ut.advanced_amount) AS total_advanced_amount
                FROM advanced__payments ut

                    WHERE  ut.advanced_date >= '$start_date' + INTERVAL 0 MONTH AND ut.advanced_date<'$start_date' + INTERVAL 1 MONTH
               GROUP BY ut.user_id
           ) userTotal_Advanced
          ON userTotal_Advanced.user_id = u.id
       ORDER BY u.id";
     // $result=$this->db->class_select_option($query);

     $result=$this->db->class_select_option($query);

     return $result;


   }

   //Find All Test Details
public function find_user_all_meal($user_id,$startDate)
   {
    $date = new DateTime($startDate);
    $start_date=$date->modify('first day of this month')->format('Y-m-d');
    $end_date=$date->modify('last day of this month')->format('Y-m-d');

    $query="SELECT *
    FROM
  (
    SELECT a.Date AS mydate
    FROM (
           SELECT date('$end_date') - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY AS Date
           FROM (SELECT 0 AS a
                 UNION ALL SELECT 1
                 UNION ALL SELECT 2
                 UNION ALL SELECT 3
                 UNION ALL SELECT 4
                 UNION ALL SELECT 5
                 UNION ALL SELECT 6
                 UNION ALL SELECT 7
                 UNION ALL SELECT 8
                 UNION ALL SELECT 9) AS a
             CROSS JOIN (SELECT 0 AS a
                         UNION ALL SELECT 1
                         UNION ALL SELECT 2
                         UNION ALL SELECT 3
                         UNION ALL SELECT 4
                         UNION ALL SELECT 5
                         UNION ALL SELECT 6
                         UNION ALL SELECT 7
                         UNION ALL SELECT 8
                         UNION ALL SELECT 9) AS b
             CROSS JOIN (SELECT 0 AS a
                         UNION ALL SELECT 1
                         UNION ALL SELECT 2
                         UNION ALL SELECT 3
                         UNION ALL SELECT 4
                         UNION ALL SELECT 5
                         UNION ALL SELECT 6
                         UNION ALL SELECT 7
                         UNION ALL SELECT 8
                         UNION ALL SELECT 9) AS c
         ) a
    WHERE a.Date BETWEEN '$start_date' AND '$end_date'
  ) dates
  LEFT JOIN
  (
    SELECT IFNULL(noOfMeal,0) as noOfMeal ,mealDate
    FROM
      meals
    where user_id='$user_id'
  ) data
    ON DATE_FORMAT(dates.mydate, '%Y%m%d') = DATE_FORMAT(data.mealDate, '%Y%m%d')
    ORDER BY myDate DESC";
    $result=$this->db->select($query);
          return $result;

   }
   public function find_rent_and_extra_costs($startDate)
   {
     $date = new DateTime($startDate);
     $start_date=$date->modify('first day of this month')->format('Y-m-d');
     $end_date=$date->modify('last day of this month')->format('Y-m-d');

    $query= " SELECT * FROM `rent_and_extra_costs`
        WHERE cost_date >= '$start_date' + INTERVAL 0 MONTH AND cost_date < '$start_date' + INTERVAL 1 MONTH
               ";
               $result=$this->db->class_select_option($query);

                return $result;


   }




   public function add_meal($user_id,$noOfMeal,$mealDate)
  {


    if ($user_id =="" || $noOfMeal == "" || $mealDate=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $insert_query="INSERT INTO meals(user_id,noOfMeal,mealDate) VALUES ('$user_id','$noOfMeal','$mealDate')";

          $results=$this->db->insert($insert_query);
          if ($results) {
              echo "Successfully Inserted Meal";

          exit();
          }

     }


   }
   public function add_expense($user_id,$expenseDate,$expenseAmount,$expenseType)
  {


    if ($user_id =="" || $expenseDate == "" || $expenseAmount=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $insert_query="INSERT INTO expenses(user_id,expenseDate,expenseAmount,expenseType) VALUES ('$user_id','$expenseDate','$expenseAmount','$expenseType')";

          $results=$this->db->insert($insert_query);
          if ($results) {
              echo "Successfully Inserted Expense";

          exit();
          }

     }


   }
   public function add_advanced_payments($user_id,$advancedDate,$advancedAmount)
  {


    if ($user_id =="" || $advancedDate == "" || $advancedAmount=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $insert_query="INSERT INTO advanced__payments (user_id,	advanced_date,advanced_amount) VALUES ('$user_id','$advancedDate','$advancedAmount')";

          $results=$this->db->insert($insert_query);
          if ($results) {
              echo "Successfully Inserted Payments";

          exit();
          }

     }


   }
   public function add_rent_and_extra_costs($cost_type,$cost_date,$cost_amount)
  {


    if ($cost_date =="" || $cost_type == "" || $cost_amount=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $insert_query="INSERT INTO rent_and_extra_costs (cost_type,	cost_date,cost_amount) VALUES ('$cost_type','$cost_date','$cost_amount')";

          $results=$this->db->insert($insert_query);
          if ($results) {
              echo "Successfully Inserted Costs";

          exit();
          }

     }


   }
   public function add_users_note($name,$subject,$description,$contact_no)
  {

    $now = new DateTime();
    $date= $now->format('Y-m-d');


    if ($name =="" || $subject == "" || $description=="" || $contact_no == "") {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $insert_query="INSERT INTO users_note(name,subject,description,date,contact_no) VALUES ('$name','$subject','$description',$date,$contact_no)";

          $results=$this->db->insert($insert_query);
          if ($results) {
              echo "Thank You";

          exit();
          }

     }


   }
   public function update_meal($meal_id,$user_id,$noOfMeal,$mealDate)
  {
   var_dump($user_id);

    if ($user_id =="" || $noOfMeal == "" || $mealDate=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $query="UPDATE  meals SET

        noOfMeal='$noOfMeal',
        mealDate='$mealDate',
        user_id='$user_id'
        WHERE id = '$meal_id' ";
          $results=$this->db->update($query);
          if ($results) {
              echo "Successfully Updated Meal";
              exit();
          }

     }


   }
   public function update_expense($expense_id,$user_id,$expenseDate,$expenseAmount,$expenseType)
  {


    if ($expense_id =="" || $user_id == "" || $expenseDate=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $query="UPDATE  expenses SET

        user_id='$user_id',
        expenseAmount='$expenseAmount',
        expenseDate='$expenseDate',
        expenseType='$expenseType'
        WHERE id = '$expense_id' ";
          $results=$this->db->update($query);
          if ($results) {
              echo "Successfully Updated Expenses";
              exit();
          }

     }


   }
   public function  update_advanced_payments($advanced_payments_id,$user_id,$advancedDate,$advancedAmount)
  {


    if ($advanced_payments_id =="" || $user_id == "" || $advancedDate=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $query="UPDATE  advanced__payments SET

        user_id='$user_id',
        advanced_amount='$advancedAmount',
        advanced_date='$advancedDate'

        WHERE id = '$advanced_payments_id' ";
          $results=$this->db->update($query);
          if ($results) {
              echo "Successfully Updated Payments";
              exit();
          }

     }


   }
   public function  update_rent_and_extra_costs($rent_costs_id,$cost_type,$cost_date,$cost_amount)
  {


    if ($rent_costs_id =="" || $cost_type == "" || $cost_date=="" ) {
      echo " Field Must Not be Empty";

      exit();
    }

   else
   {
        $query="UPDATE  rent_and_extra_costs SET

        cost_type='$cost_type',
        cost_date='$cost_date',
        cost_amount='$cost_amount'

        WHERE id = '$rent_costs_id' ";
          $results=$this->db->update($query);
          if ($results) {
              echo "Successfully Updated Payments";
              exit();
          }

     }


   }




public function last_Added_User_Count()
   {
   $query= "SELECT COUNT(*) AS total_user FROM users WHERE created_at >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)";

     $result=$this->db->class_select_option($query);
     //$result=mysqli_num_rows($Total_Test_count);
     return $result;

   }








}



?>
