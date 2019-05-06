<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
$usr= new User;
$result=$usr->find_all_users();
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
             
                   <!-- SearchForm -->
                   <!-- display month -->
                 
                   <!-- display month -->

              <div class="table-responsive" id="try">
                           <div align="center">
                          <button type="button" class="btn-success btn-xs" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fas fa-plus fa-lg"></i>Add User</button>  <br />
                     </div>
<div id="usertable">
                <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="dataTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>About</th>
                      <th>Created_at </th>
                      <th>Change Status </th>
                      <th>Actions </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Name</th>
                      <th>Email</th>
                      <th>About</th>
                      <th>Created_at </th>
                      <th>Change Status </th>
                      <th>Actions </th>
                  </tr>
                  </tfoot>
                  <tbody id="userDataBody">
                   <?php
                   $users_data=array();

                         if($result){

                               while($row = mysqli_fetch_array($result))
                               {
                                  $users_data[] = $row;


                               ?>
                               <tr id="mealDatatable">
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><textarea name="" id="" cols="15" rows="2">
                                      <?php echo $row["about"]; ?>
                                    </textarea></td>
                                    <td><?php echo $row["created_at"]; ?></td>
                                    <td>
                                      <button  class="btn btn-warning btn-xs status" id="<?php echo $row['id'] ?>">
                                        <?php 
                                         echo $row['status']==1 ? 'Active' : 'Inactive';

                                      ?>
                                        
                                      </button>
                                     
                                        </td>
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
                     <h4 class="modal-title">Add User</h4>
                </div>
                
                <div class="modal-body" style="background-color:#f9f7f2;">
                     <form method="post" id="insert_form">
                  
                <div class="form-group">
                      <label>Name</label>
                       <input type="text" name="name" id="name" class="form-control" placeholder="Enter  name " required="" />
                </div>   
                 <div class="form-group">
                      <label>Email</label>
                       <input type="email" name="email" id="email" class="form-control" placeholder="Enter  email "  required="" />
                </div> 
                 <div class="form-group">
                      <label>password</label>
                       <input type="password" name="password" id="password" class="form-control" placeholder="Enter  password "  required="" />
                </div>  
                <div class="form-group">
                      <label>about</label>
                       <textarea  name="about" id="about" class="form-control" placeholder="Enter  about "  required="" ></textarea>
                </div>
                 <input type="hidden" name="user_id" id="user_id" value="" class="btn btn-success" />

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

      $(document).on('click', '.edit_data', function(){

          var users_id_check = $(this).attr("id");

          // $('#user_id').val(user_id);
          $('.modal-title').text("Update Users Data");

          var users_data_js_array_script = <?php echo json_encode($users_data); ?>;
          $.each(users_data_js_array_script,
            function(propName, propVal)
            {
            if(propVal['id']==users_id_check){
               $('#modal-body').html("Update Meal");

                 $('#name').val(propVal['name']);
                 $('#email').val(propVal['email']);
                 $('#about').val(propVal['about']);
                 $('#password').val(propVal['password']);
                 $('#user_id').val(propVal['id']);
                
                 $('#insert').val("Update");
                 $('#add_data_Modal').modal('show');
                 $('#insert').val("update");
                  $('#actionValue').val('update');
            }

            })

      });
      $('#insert_form').on("submit", function(event){
           event.preventDefault();

         
                $.ajax({
                     url:"Crud/Users/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){

                      if($.trim(data) == "Successfully Inserted User") {
                         $('#insert_form')[0].reset();
                          
                             alert(data);

                       
                          $('#add_data_Modal').modal().hide();

                          location.reload();
  
                  }
                  else if($.trim(data) == "Successfully Updated User") {
                         $('#insert_form')[0].reset();
                          
                             alert(data);

                        
                          $('#add_data_Modal').modal().hide();

                          location.reload();
  
                  }
                  else{
                    alert(data);

                  }

                         

                     }
                });
           
      });
       $(document).on('click', '.status', function(){
      if (confirm('Are you sure to Change status?')) {
        
           var user_id = $(this).attr("id");
          
           if(user_id != '')
           {
                $.ajax({
                     url:"Crud/Users/change_status.php",
                     method:"POST",
                     data:{user_id:user_id},
                      success:function(data){
                           // $('#userDataBody tbody').html(data);
                           alert(data);
                          location.reload();
                     }
                });
           } }
      });


     $(document).on('click', '.delete_data', function(){
      if (confirm('Are you sure to Delete?')) {
           var user_id = $(this).attr("id");
          
           if(user_id != '')
           {
                $.ajax({
                     url:"Crud/Users/delete.php",
                     method:"POST",
                     data:{user_id:user_id},
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
