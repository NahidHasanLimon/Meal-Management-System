<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
$usr= new User;
?>
<?php 
 if (empty($_POST['date_picker']) ) {

  $now = new DateTime();
  $startDate= $now->format('Y-m').'-01';

$result=$usr->find_rent_and_extra_costs($startDate);



   }
        else
        {

  $startDate=$_POST['date_picker'].'-01';


$result=$usr->find_rent_and_extra_costs($startDate);


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

        <div class="container-fluid">

           <?php
         // include_once ($filepath.'/../inc/breadcrumb.php');
      ?>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i>
              Rent Costs Details
            </div>
            <div class="card-body">
              <!-- SearchForm -->
              <form class="form-inline my-2 my-lg-0 mt-4" action="" method="post" autocomplete="off">

                    <input type="text" class="form-control mr-sm-2" name="date_picker"id="date_picker" placeholder="Select your month..." style="width:60%;">

                        <input value="Search" name="search" id="search" class="btn btn-info btn-sm" type="submit" onClick="return document.getElementById('date_picker').value !='' "></button>
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

              <div class="table-responsive" id="try">
                           <div align="center">
                          <button type="button" class="btn-success btn-xs" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fas fa-plus fa-lg"></i>Add Rent/Costs</button>  <br />
                     </div>
<div id="usertable">
                <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="dataTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Cost Type</th>
                      <th>Amount</th>
                      <th>Actions </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Cost Type</th>
                      <th>Amount</th>
                      <th>Actions </th>
                  </tr>
                  </tfoot>
                  <tbody id="userDataBody">
                   <?php
                   $rent_costs_data=array();

                         if($result){

                               while($row = mysqli_fetch_array($result))
                               {
                                  $rent_costs_data[] = $row;


                               ?>
                               <tr id="mealDatatable">
                                    <td><?php echo $row["cost_type"]; ?></td>
                                    <td><?php echo $row["cost_amount"]; ?></td>
                                      <td>
                                      <button name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data"><i class="far fa-edit"></i> </button> ||
                                   <button class="btn btn-danger btn-xs delete_data" name="delete" value="" id="<?php echo $row["id"]; ?>"><i class="fa fa-trash" aria-hidden="true" style="font-size:18px;"></i></button>
                                    </td>
                              </tr>
                               <?php } }else{

                                echo"No Data available";
                               }
                             ?>




                  </tbody>
                </table>
              </div>
              </div>
            </div>

          </div>

        </div>
      <!--   Logout Modal -->
    <?php
      include_once ($filepath.'/../inc/logout-modal.php');

      include_once ($filepath.'/../inc/modal/view-modal.php');
     ?>

<!-- EDIT/Insert Modal -->
        <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header" style="background-color:#1eccc3;">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Add Costs</h4>
                </div>
                <div class="modal-body" style="background-color:#f9f7f2;">
                     <form method="post" id="insert_form" autocomplete="off">
                  <div class="form-group">
                      <label>Select A User</label>

                      <select name="cost_type" id="cost_type" class="form-control" >
                    <option value="">Select Cost Type</option>
                    <option value="rent">Rent</option>
                    <option value="utility">Utility</option>
                    <option value="extra">Extra</option>
                    </select>
                </div>
                <div class="form-group">
                <!-- Datepicker -->
                <label for=""> Select a Costs Month/Date </label>
           <input class="form-control" type="text" id="datepicker" name="datepicker" format="yyyy-mm-dd"></p>
          <!-- End Datepicker -->
        </div>
        <span id="message"></span>
                        <div class="form-group">
                           <label>Enter Cost Amount</label>
                          <input type="number" name="cost_amount" id="cost_amount" class="form-control" placeholder="Enter  Amount " />
                          </div>
                           
                         

                          <input type="hidden" name="rent_costs_id" id="rent_costs_id" value="" class="btn btn-success" />
                           <input type="submit" name="insert" id="insert" value="insert" class="btn btn-success" />

                          <input type="hidden" id="actionValue" name="actionValue" value="">
                     </form>
                </div>
                <div class="modal-footer" style="background: #b8e0c7;">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

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

     <?php
      include_once ($filepath.'/../inc/scripts.php');
        ?>
    <script type="text/javascript">
 $(document).ready(function(){

  // var month='<?php
  // echo
  $startDate ?>';

  //  $('#date_picker').val(month);

      $('#expenseAmount').click(function(){
         if($('#datepicker').val() == "")
           {
                alert(" pick a  Date");
           }
      });

      $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
      });

      $(document).on('click', '.edit_data', function(){

          var rent_costs_id_check = $(this).attr("id");

          $('#rent_costs_id').val(rent_costs_id_check);
          $('.modal-title').text("Update Rent and Costs");

          var rent_costs_data_js_array_script = <?php echo json_encode($rent_costs_data); ?>;
          $.each(rent_costs_data_js_array_script,
            function(propName, propVal)
            {
            if(propVal['id']==rent_costs_id_check){
               $('#modal-body').html("Update Meal");
                 $('#cost_type').val(propVal['cost_type']);
                 $('#cost_amount').val(propVal['cost_amount']);
                 $('#datepicker').val(propVal['cost_date']);
                 $('#insert').val("Update");
                 $('#add_data_Modal').modal('show');
                 $('#insert').val("update");
                  $('#actionValue').val('update');
            }

            })

      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();

          if($('#cost_type').val() == "")
           {
                alert("Type Selection is required");
           }
           else if($('#datepicker').val() == '')
           {
                alert("Date Selection is Requeried");
           }
           else if($('#cost_amount').val() == '')
           {
                alert("Amount is required");
           }
          


           else
           {
                $.ajax({
                     url:"Crud/Rent_Costs/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                             // alert("Successfully Done");
                             alert(data);
                          $('#dataTable tbody').html(data);
                          location.reload();

                     }
                });
           }
      });

     $(document).on('click', '.delete_data', function(){
      if (confirm('Are you sure to Delete?')) {
           var rent_costs_id = $(this).attr("id");
          
           if(rent_costs_id != '')
           {
                $.ajax({
                     url:"Crud/Rent_Costs/delete.php",
                     method:"POST",
                     data:{rent_costs_id:rent_costs_id},
                     success:function(data){
                           // $('#userDataBody tbody').html(data);
                           alert(data);
                          location.reload();
                     }
                });
           } }
      });



  $( function() {

    $( "#datepicker" ).datepicker({
       dateFormat: "yy-mm-dd"

    });

  });



   });
</script>

   <script>
    $('#date_picker').datepicker({
 // dateFormat: "yy-mm-dd",
  dateFormat: 'yy-mm',
  startView: "months",
  minViewMode: "months",

 });

  </script>
 <!--  <script type="text/javascript"> -->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
