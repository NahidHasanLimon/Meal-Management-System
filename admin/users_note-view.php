<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
$usr= new User;
?>
<?php 
 if (empty($_POST['date_picker']) ) {
  
  $now = new DateTime();
  $startDate= $now->format('Y-m').'-01'; 



$result=$usr->find_users_note($startDate);



   }
        else
        {

  $startDate=$_POST['date_picker'].'-01'; 
  

$result=$usr->find_users_note($startDate);


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
              Meal Details
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
                           
<div id="usertable">
                <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="dataTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Subject</th>
                      <th>contact no </th>
                      <th>Description</th>
                      
                      <th>Actions</th>
                     
                    


                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>Date</th>
                      <th>Name</th>
                      <th>Subject</th>
                      <th>contact no </th>
                      <th>Description</th>
                      
                      <th>Actions</th>
                  
                    
                    </tr>
                  </tfoot>
                  <tbody id="userDataBody">
                   <?php
                   $meal_data=array();

                         if($result){ 

                               while($row = mysqli_fetch_array($result))
                               {
                                  $meal_data[] = $row;


                               ?>
                               <tr id="mealDatatable">
                                    <td><?php echo $row["date"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["subject"]; ?></td>
                                    <td><?php echo $row["contact_no"]; ?></td>
                                    <td>
                                      <textarea name="" id="" cols="20" rows="2" readonly=""><?php echo $row["description"]; ?></textarea>
                                    </td>
                                   
                                    <td> 
                                     
                                   <button class="btn btn-danger btn-xs delete_data" name="delete" value="" id="<?php echo $row["id"]; ?>"><i class="fa fa-trash" aria-hidden="true" style="font-size:18px;"></i></button> 
                                    </td>

                                    

                                     
                               </tr>
                               <?php } }else{
                                
                                echo"No Data available";
                               }
                             ?>
                             
                  <?php
                  // print_r($meal_data);

                  $meal_data_js_array = json_encode($meal_data);

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
                     <h4 class="modal-title">Add Meal</h4>
                </div>
                <div class="modal-body" style="background-color:#f9f7f2;">
                     <form method="post" id="insert_form" autocomplete="off">
                  <div class="form-group">
                      <label>Select A User</label>

                      <select name="user_id" id="user_id" class="form-control" >
                    <option value="">Select Your User</option>
                    <?php
                //Get all user  data
                  $result=$usr->get_all_user_by_active_status();

                //Count total number of rows
                  $rowCount=mysqli_num_rows($result);
                    //$rowCount=$usr->class_select_option();
                    if($rowCount > 0){

                        while($row = $result->fetch_assoc()){
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }else{
                        echo '<option value="">User not available</option>';
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <!-- Datepicker -->
                <label for=""> Choose meal date </label>
           <input class="form-control" type="text" id="datepicker" name="datepicker" format="yyyy-mm-dd"></p>
          <!-- End Datepicker -->
        </div>
        <span id="message"></span>
                        <div class="form-group">
                           <label>Enter No of Meal</label>
                          <input type="number" name="noOfMeal" id="noOfMeal" class="form-control" placeholder="Enter No of meal" />
                          </div>
                         <!--  <input type="hidden" id="user_id" /> -->
                              <input type="hidden" name="meal_id" id="meal_id" value="" class="btn btn-success" />

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

   $('#add').click(function(){
           $('#insert').val("Insert");
           $('#insert_form')[0].reset();
      });

     
    
    
     $(document).on('click', '.delete_data', function(){
      if (confirm('Are you sure to Delete?')) {
           var users_note_id = $(this).attr("id");
         
           if(users_note_id != '')
           {
                $.ajax({
                     url:"Crud/Users_note/delete.php",
                     method:"POST",
                     data:{users_note_id:users_note_id},
                     success:function(data){
                           // $('#userDataBody tbody').html(data);
                           alert(data);
                          location.reload();
                     }
                });
           } }
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
