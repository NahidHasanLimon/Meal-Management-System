<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');

$usr= new User;


if (empty($_POST['date_picker']) ) {

  $now = new DateTime();
  $startDate= $now->format('Y-m').'-01';


$all_user_to=$usr->find_all_user_meal_details($startDate);

$Calculation=$usr->find_all_user_meal_details($startDate)->fetch_assoc();

$totalMealCount=$Calculation['TotalMealCount'];

$totalExpenseAmount=round($Calculation['TotalExpenseAmount'],2);

$mealRate=round($Calculation['mealRate'],2);

$totalAdvanced=round($Calculation['All_user_Total_AdvancedAmount'],2);

$totalRemaining=round(($totalAdvanced-$totalExpenseAmount),2);

$rent_cost=$usr->find_rent_and_extra_costs($startDate);

 print_r($rent_cost);

   }
        else
        {

  $startDate=$_POST['date_picker'].'-01';


$all_user_to=$usr->find_all_user_meal_details($startDate);

$Calculation=$usr->find_all_user_meal_details($startDate)->fetch_assoc();

$totalMealCount=$Calculation['TotalMealCount'];

$totalExpenseAmount=round($Calculation['TotalExpenseAmount'],2);

$mealRate=round($Calculation['mealRate'],2);


$totalAdvanced=round($Calculation['All_user_Total_AdvancedAmount'],2);

$totalRemaining=round(($totalAdvanced-$totalExpenseAmount),2);

$rent_cost=$usr->find_rent_and_extra_costs($startDate);


      }

 ?>

<!DOCTYPE html>
    <?php
         include_once ($filepath.'/../inc/header.php');
     ?>


  <body id="page-top">
    <?php
         include_once ($filepath.'/../inc/nav.php');
     ?>



    <div id="wrapper">

      <!-- Sidebar -->
      <?php
         include_once ($filepath.'/../inc/side-bar.php');
     ?>


      <div id="content-wrapper">

       <!-- container-fluid Div -->
       <div class="container-fluid">

      
      <?php
         include_once ($filepath.'/../inc/icon-card.php');
      ?>
   </div>
          <!-- DataTables Example -->
            <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i>
             Month OverView
            </div>
            <div class="card-body">
              <!-- SearchForm -->
              <form class="form-inline my-2 my-lg-0 mt-4" action="" method="post" autocomplete="off">

                    <input type="text" class="form-control mr-sm-2" name="date_picker"id="date_picker" placeholder="Select your month..." style="width:60%;">

                        <input value="Search" name="search" id="search" class="btn btn-info btn-md" type="submit" onClick="return document.getElementById('date_picker').value !='' "></button>
                    </span>

                </form>
                   <!-- SearchForm -->
                   <!-- display month -->
                   <p>
                     <h3 class="text-left" id="month" value="<?php
                  echo date('F , Y', strtotime($startDate));
                  ?>">  <b><?php
                  echo date('F , Y', strtotime($startDate));
                  ?></b> </h3>
                   </p>
                   <!-- display month -->

               <h3 class="text-center" id="month" value="<?php
                  echo date('F , Y', strtotime($startDate));
                  ?>">  <b><?php
                  echo date('F , Y', strtotime($startDate));
                  ?></b> Overview </h3>
                <!-- Overview -->
                  <div class="card-body">
                      <div class="table-responsive-xl">
                      <table class="table table-lg table table-bordered table table-hover table-dark" style="max-width: 30%; max-height:5%;">
                        <tr>
                          <td colspan="3" class="text-center"> Summary</td>
                        

                        </tr>
                        <tr>
                          <td colspan="2"> Total Meal</td>
                          <td><?php echo $totalMealCount ?></td>
                        </tr>
                        <tr>
                          <td colspan="2"> Total Expense</td>
                          <td><?php echo $totalExpenseAmount ?></td>
                          
                        </tr>
                        <tr>
                          <td  colspan="2"> Meal Rate</td>
                          <td><?php echo $mealRate ?></td>
                        </tr>
                         <tr>
                          <td colspan="2"> Total Advanced</td>
                          <td><?php echo $totalAdvanced ?></td>
                           
                        </tr>
                         <tr>
                          <td colspan="2"> Remaining Amount</td>
                          <td><?php echo $totalRemaining ?></td>
                        </tr>
                      </table>
                      </div>

              <input type="hidden" id="start_date" name="start_date" value="<?php echo $startDate  ?>">

                   </div>
                <!-- Overview -->
                    <div class="card-body">
                      <div class="table-responsive-xl">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
              <th class="text-center">#</th>
              <th class="text-center">Name</th>
              <th class="text-center">Total Meal</th>
              <th class="text-center">Total Expense($)</th>
              <th class="text-center">Advanced Given($)</th>
              <th class="text-center">Remaining ($)</th>
              <th class="text-center">Status</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
              <th class="text-center">#</th>
              <th class="text-center">Name</th>
              <th class="text-center">Total Meal</th>
              <th class="text-center">Total Expense($)</th>
              <th class="text-center">Advanced Given($)</th>
              <th class="text-center">Remaining ($)</th>
              <th class="text-center">Status</th>
             
                    </tr>
                  </tfoot>
                  <tbody>

 
        <?php

if($all_user_to)
{
  $i=0;
  while ($row=$all_user_to->fetch_assoc()) {
     $i++;
  ?>

      <tr>

        <td><?php echo  $row['id']; ?></td>
        <td><?php echo  $row['name']; ?></td>
    <input type="hidden" id="name" name="name" value="<?php echo  $row['name']  ?>">
        <td><?php echo  $row['meal']; ?></td>
        <td><?php echo  round($row['expense'],2) ?></td>
        <td><?php echo  $row['advanced']; ?></td>
        <td><?php echo  round($row['remaining'],2) ?></td>
        <?php
        if ($row['expense']>$row['advanced']) {

        ?>
         <td>Debit</td>
         <?php
         } else {
         ?>
            <td>Credit</td>
          <?php } ?>
        
     </tr>

<?php } } ?>


                  </tbody>



                </table>

              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php
        include_once ($filepath.'/../inc/footer.php');
        ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
      <?php
      include_once ($filepath.'/../inc/logout-modal.php');
        ?>
  <!-- Logout Modal-->
      <?php
      include_once ($filepath.'/../inc/scripts.php');
        ?>
   <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
  // $( "#datepicker" ).datepicker({
   $("#date_picker").datepicker({
        dateFormat: 'MM yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
        }
    });
//End of Datepicker
 
});

    </script>
  </body>

</html>
