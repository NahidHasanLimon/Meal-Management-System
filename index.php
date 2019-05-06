<!doctype html>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/admin/classes/User.php');
$usr= new User;



 if (empty($_POST['date_picker']) ) {

  $now = new DateTime();
  $startDate= $now->format('Y-m').'-01';
  $notice=$usr->find_all_user_active_notices($startDate);



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
    $notice=$usr->find_all_user_active_notices($startDate);


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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Meal Management</title>

    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">


    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
  .body
{
    background-image:url("asset/background_1.jpg") no-repeat;
}

  /*Print Section */
 
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}






  /*Print Section */



.contact {

  background-color : #31B0D5;
  color: white;
  padding: 5px 5px;
  border-radius: 4px;
  border-color: #46b8da;
  cursor: pointer;
}

#contact_Button{
 /* position: fixed;
  bottom: -4px;
  right: 14px;*/
   position: fixed;
    bottom: 0px;
    right: 0px;
    cursor: pointer;
}
.ui-datepicker-calendar {

    display: none;

}​


      </style>

  </head>

  <body>


      <div class="container">
        <div class="contact_Button">
      </div>
<section class="d-flex text-center">
  <div class="container d-flex justify-content-center">
    <div class="row align-items-center justify-content-center">
      <div class="col-14 mb-2">
         <marquee><p style="font-family: Impact; font-size: 18pt">Welcome! Dear <3 </p></marquee>

       <p> <h6 class="text-center"><b>Month Meal Details</b></h6>
              <form class="form-inline" action="index.php" method="post" autocomplete="off">

                    <input type="text" class="form-control" name="date_picker"id="date_picker" placeholder="Select your month..." style="width:75%;">

                        <button value="Search" name="search" id="search" class="form-control btn btn-info btn-sm ml-2" type="submit" onClick="return document.getElementById('date_picker').value !='' " style="width: 20%;"><i class="fas fa-search"></i></button>
                    </span>

                </form>
              </p>

      </div>
    </div>

  </div>

</section>
 <h3 class="text-center" id="month" value="<?php
                  echo date('F , Y', strtotime($startDate));
                  ?>">  <b><?php
                  echo date('F , Y', strtotime($startDate));
                  ?></b> Details </h3>


<h3 class="text-right"><button id="contact" href="#contact_modal" role="button" class="contact" data-toggle="modal">Leave A Note</button></h3>

<span id="message_succcess" class="text-success"> </span>

<div class="row">
  <div class="col-xs-8">
               
                    <div class="card-body">
                      <div class="table-responsive-xl">
                      <table class="table table-sm table table-bordered table table-hover table-dark" style="max-width:30%;max-height: 5%;">
                        <tr>
                          <td colspan="3" class="text-center"> Summary</td>
                          <td colspan="1" class="text-center"> Actions</td>

                        </tr>
                        <tr>
                          <td colspan="2"> Total Meal</td>
                          <td><?php echo $totalMealCount ?></td>
                        </tr>
                        <tr>
                          <td colspan="2"> Total Expense</td>
                          <td><?php echo $totalExpenseAmount ?></td>
                          <td>
                            <button type="button" class="btn btn-outline-info btn-sm view_all_users_expense"><i class="fas fa-eye"></i></button>
                          </td>
                        </tr>
                        <tr>
                          <td  colspan="2"> Meal Rate</td>
                          <td><?php echo $mealRate ?></td>
                        </tr>
                         <tr>
                          <td colspan="2"> Total Advanced</td>
                          <td><?php echo $totalAdvanced ?></td>
                           <td>
                            <button type="button" class="btn btn-outline-info btn-sm view_all_users_advanced"><i class="fas fa-eye"></i></button>
                          </td>
                        </tr>
                         <tr>
                          <td colspan="2"> Remaining Amount</td>
                          <td><?php echo $totalRemaining ?></td>
                        </tr>
                      </table>
                      </div>

              <input type="hidden" id="start_date" name="start_date" value="<?php echo $startDate  ?>">

                   </div>

                 <!-- End of Card Body   -->



        <!-- End of Card    -->
        </div>
        <!-- End of col sm -->
        <div class="col-xs-4">
          <div class="row">
            <?php
            if($notice)
{
  while ($row_notice=$notice->fetch_assoc()) { 
  ?>
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Notice!</strong><?php echo $row_notice['description']; ?>
</div>
<?php } } ?>

</div>

        </div>
        <!-- End of col-sm  -->
      </div> 
      <!-- End of Row -->
   

       <!-- DataTables Example -->


            <div class="card-body">
              <marquee><p style="font-family: Impact; font-size: 18pt">Mobile Users please slide your screen for enjoy the full below feature <3 </p></marquee>
              <div class="table-responsive" id="user">

                <table class="table table-sm table table-bordered table-dark" id="dataTable" width="100%" height="60%"cellspacing="0" >
                  <!-- style="background:#1b705b;" -->
                  <thead>
                    <tr>
              <th class="text-center">#</th>
              <th class="text-center">Name</th>
              <th class="text-center">Total Meal</th>
              <th class="text-center">Total Expense($)</th>
              <th class="text-center">Advanced Given($)</th>
              <th class="text-center">Remaining ($)</th>
              <th class="text-center">Status</th>
              <th class="text-center">Actions</th>

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
              <th class="text-center">Actions</th>
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
        <td>
          <button type="button" name="view-meal" value="View meal" id="<?php echo $row['id']; ?>" class="btn btn-info btn-xs view_meal" /> <i class="fa fa-eye-slash" aria-hidden="true"></i> </button>



          <button type="button" name="delete" value="Print" id="<?php echo $row['id']; ?>" class="btn btn-danger btn-xs print" /><i class="fa fa-print" aria-hidden="true"></i></button></td>
     </tr>

<?php } } ?>


                  </tbody>

                </table>

              </div>
               <marquee><p style="font-family: Impact; font-size: 18pt">Thank You For Using! <3 </p></marquee>
            </div>
          <!-- Datatable -->


          <?php
        include_once ('inc/view-modal.php');
        include_once ('inc/contact-modal.php');
        include_once ('inc/payslipdemo.php');
          ?>





    </div>

    <!-- /.container -->


   <script src="admin/vendor/jquery/jquery.min.js"></script>

    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="admin/js/demo/datatables-demo.js"></script>



      <!-- Start datpickr/ -->
     <script src="admin/vendor/bootstrap/js/bootstrap-datepicker.js"></script>

      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script>
    $('#date_picker').datepicker({

  dateFormat: 'yy-mm',
  startView: "months",
  minViewMode: "months",

 });

  </script> -->
  <script type="text/javascript">
 $(document).ready(function(){
   //Modal Print Button
document.getElementById("btn_modal_Print").onclick = function () {
    printElement(document.getElementById("printDiv"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
   //
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

  
  //


      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
      });

      $(document).on('click', '.edit_data', function(){
           var class_id = $(this).attr("id");
           $.ajax({
                url:"admin/Crud/Class/fetch.php",
                method:"POST",
                data:{class_id:class_id},
                dataType:"json",
                success:function(data){
                     $('#className').val(data.class_name);
                     $('#classID').val(data.class_id);
                     $('#class_id').val(data.class_id);
                     $('#insert').val("Update");
                     $('#add_data_Modal').modal('show');

                }
           });
      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
           if($('#user_id').val() == "")
           {
                alert("User is required");
           }
           else if($('#noOfMeal').val() == '')
           {
                alert("No of Meal is required is required");
           }

           else
           {
                $.ajax({
                     url:"admin/Process/FrontEnd/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                               alert(data);
                          $('#userDataBody tbody').html(data);
                          location.reload();
                     }
                });
           }
      });
      $(document).on('click', '.view_meal', function(){
           var user_id = $(this).attr("id");
           var start_date = $('#start_date').val();
           var name = $('#name').val();
           // alert(name);
           if(user_id != '')
           {
                $.ajax({
                     url:"admin/Process/FrontEnd/a_user_mealFetch.php",
                     method:"POST",
                     data:{user_id:user_id,start_date:start_date},
                     success:function(data){

                          $('#modal-body').html(data);
                           $('#modal-title').html('Meal Details');
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
    
   
     
   //Print Receipt 

       $(document).on('click', '.print', function(){
           var user_id = $(this).attr("id");
           var start_date = $('#start_date').val();
           var name = $('#name').val();
           // alert(user_id);
           // alert(name);
           if(user_id != '')
           {
                $.ajax({
                     url:"admin/Process/FrontEnd/print_detail_fetch.php",
                     method:"POST",
                     data:{user_id:user_id,start_date:start_date},
                     success:function(data){

                        $('#modal-title').html('Money Receipt');
                         $('#fetch_div').html(data);
                          $('#Modal_payslip').modal('show');
                        
                     }
                });
           }
      });
       // $(document).on('click', '#Modal_Print', function(){
       //   window.print();
          
      // });
      //Print Receipt 
      $(document).on('click', '.view_all_users_expense', function(){

           var start_date = $('#start_date').val();
           var month = $('#month').val();
             var totalExpenseAmount = <?php echo $totalExpenseAmount;?>

           // alert(start_date);
           if(start_date != '')
           {
                $.ajax({
                     url:"admin/Process/FrontEnd/allUserExpenseFetch.php",
                     method:"POST",
                     data:{start_date:start_date,totalExpenseAmount:totalExpenseAmount},
                     success:function(data){
                          $('#modal-title').html('Expense Details');
                          $('#modal-body').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
      $(document).on('click', '.view_all_users_advanced', function(){

           var start_date = $('#start_date').val();

             var totalAdvanced = <?php echo $totalAdvanced;?>

           // alert(start_date);
           if(start_date != '')
           {
                $.ajax({
                     url:"admin/Process/FrontEnd/allUserAdvancedFetch.php",
                     method:"POST",
                     data:{start_date:start_date,totalAdvanced:totalAdvanced},
                     success:function(data){
                          $('#modal-title').html(' Advanced Details');
                          $('#modal-body').html(data);
                          $('#dataModal').modal('show');
                     }
                });
           }
      });
      // Contact Form Submit
      $('#contactForm').on("submit", function(event){
           event.preventDefault();
           if($('#name').val() == "")
           {
                alert("please write your Name");
           }
           else if($('#description').val() == '')
           {
                alert("please put a message!!");
           }


           else
           {
                $.ajax({
                     url:"notes_insert.php",
                     method:"POST",
                     data:$('#contactForm').serialize(),
                     beforeSend:function(){
                          $('#submit').val("Sending");
                     },
                     success:function(data){
                          $('#contactForm')[0].reset();
                        // $("#contact").html(data);
                        $("#contact_modal").modal('hide');  
                      
                       $('#message_success').fadeIn().html("Notes Sent to Admin!! Thank You for Your Notes!");
                            setTimeout(function() {
                            $('#message_success').fadeOut("slow");
                          }, 2000 );
                                        

                    },
                    error: function(){
                      alert("Error");
                    }
            });
           }
      });
      //


   });

  </script>
   <!-- <script type="text/javascript" src="inc/contact_form_validation.js"> </script> -->
  </body>
</html>
