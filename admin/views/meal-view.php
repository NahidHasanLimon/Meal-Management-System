<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
$usr= new User;
?>
<?php
$result=$usr->find_all_user_only_meal_details();
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
         include_once ($filepath.'/../inc/breadcrumb.php');
      ?>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Class Details  <a href="addtest.php">For Add Meal </a></div>
            <div class="card-body">
              <div class="table-responsive" id="try">
                           <div align="center">
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add Meal</button>  <br />
                     </div>
<div id="usertable">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Meal</th>

                      <th>Edit </th>
                      <th>View</th>
                      <th>Delete</th>


                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Meal</th>

                      <th>Edit </th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody id="userDataBody">
                   <?php
                               while($row = mysqli_fetch_array($result))
                               {
                                  $meal_data[] = $row;


                               ?>
                               <tr>
                                    <td><?php echo $row["mealDate"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["noOfMeal"]; ?></td>

                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>

                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>

                                    <td><input type="button" name="delete" value="delete" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs delete_data" /></td>
                               </tr>
                               <?php

                               }
                               // print_r($meal_data[1]['id']);
                               // if ($meal_data['id']) {
                               //   echo "ok";
                               // }
                                // $mealDetails=array();
                                // $id='17';
                               foreach($meal_data as $key => $mealdate)
                               {
                                 // $js_array = json_encode($mealdate);
                                 // echo "var javascript_array = ". $js_array . ";\n";
                                  // print_r($id);

                                  // if ($mealdate['id']==17) {
                                  //   print_r($mealdate['name']);
                                  //   print_r($mealdate['noOfMeal']);
                                  //   print_r($mealdate['mealDate']);
                                  //   // print_r($mealdate['name']);
                                  }
                               //    // if ( $meal_data[$key]['id'] === $id )
                               //    //   $mealDetails[]=$mealdate;
                               //       // print_r( $mealdate['2']);
                               // }
                               //  // print_r( $mealDetails);

                               ?>
                               <script type='text/javascript'>
<?php
$php_array = array('abc','def','ghi');
$js_array = json_encode($php_array);
echo "var javascript_array = ". $js_array . ";\n";
?>
</script>

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
    <!-- View Data Class Modal -->
    <div id="dataModal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header"style="background-color:#1eccc3;">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h2 class="modal-title">Subject Details</h4>
                </div>
                <div class="modal-body" id="class_detail"style="background-color:#f9f7f2;">
                </div>
                <div class="modal-footer"style="background: #b8e0c7;">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>

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
                  $result=$usr->getAllUser_BY_ORDER();

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
                          <input type="hidden" id="user_id" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
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

      $(document).on('click', '.edit_data', function(){
           var meal_id = $(this).attr("id");
           $.ajax({
                url:"Crud/Meal/fetch.php",
                method:"POST",
                data:{meal_id:meal_id},
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
            // var actionValue = $('#insert').val();
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
                     url:"Crud/Meal/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){
                          $('#insert_form')[0].reset();
                          // $('#add_data_Modal').modal('hide');
                               alert(data);
                          $('#userDataBody tbody').html(data);
                          location.reload();
                     }
                });
           }
      });
      $(document).on('click', '.view_data', function(){
          // $('#class_detail').html(data);
          $('#dataModal').modal('show');

      //      var meal_id= $(this).attr("id");
      //      if(meal_id != '')
      //      {
      //           $.ajax({
      //                url:"Crud/Meal/select.php",
      //                method:"POST",
      //                data:{meal_id:meal_id},
      //                success:function(data){
      //                     $('#class_detail').html(data);
      //                     $('#dataModal').modal('show');
      //                }
      //           });
      //      }
      });
     $(document).on('click', '.delete_data', function(){
      if (confirm('Are you sure to Delete?')) {
           var class_id = $(this).attr("id");
           if(class_id != '')
           {
                $.ajax({
                     url:"Crud/Meal/delete.php",
                     method:"POST",
                     data:{class_id:class_id},
                     success:function(data){
                           // $('#userDataBody tbody').html(data);
                           alert(data);
                          location.reload();
                     }
                });
           } }
      });


// New code

          $('#datepicker').on('change',function(){
                var datepicker = $(this).val();
                var date=datepicker;
                var user_id = $('#user_id').val();
                if(user_id!=''){
                    $.ajax({
                        type:'POST',
                        url:'Process/BackEnd/mealChecking.php',
                      data:{user_id:user_id,date:date},
                        success:function(data){

                            // alert(data);
                            if (data=='exist') {
                              alert('Meal Allready Exist');
                                $('#insert').val('update');

                                $('#actionValue').val('update');

                            }

                            else {
                              $('#insert').val('insert');
                            }

                        }
                    });
                }
            });

    // End of New Code
















  $( function() {

    $( "#datepicker" ).datepicker({
       dateFormat: "yy-mm-dd"

    });

  });



   });

  </script>
    <script src="///js/demo/datatables-demo.js"></script>

  </body>

</html>
