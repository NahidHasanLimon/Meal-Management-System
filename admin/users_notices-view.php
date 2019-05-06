<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
$usr= new User;
?>
<?php 
 if (empty($_POST['date_picker']) ) {
  
  // $now = new DateTime();
  // $startDate= $now->format('Y-m').'-01'; 
  $startDate= '0000-00-01'; 




$result=$usr->find_all_notices($startDate);



   }
        else
        {

  $startDate=$_POST['date_picker'].'-01'; 
  

$result=$usr->find_all_notices($startDate);


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
                  ?>">  <b>
                    <?php 
                  if ($startDate=='0000-00-01') {
                    echo "All Notices";
                  }
                  else {

                  echo date('F , Y', strtotime($startDate));
                   }
                  ?>
                    
                  </b> </h3>
                   </p>
                   <!-- display month -->

              <div class="table-responsive" id="try">
                           <div align="center">
                          <button type="button" class="btn-success btn-xs" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fas fa-plus fa-lg"></i>Add Notice</button>  <br />
                     </div>
<div id="usertable">
                <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="dataTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>title</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Actions</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>Date</th>
                       <th>title</th>
                      <th>Description</th>
                       <th>Status</th>
                      <th>Actions</th> 

                    </tr>
                  </tfoot>
                  <tbody id="userDataBody">
                   <?php
                   $notice_data=array();

                         if($result){ 

                               while($row = mysqli_fetch_array($result))
                               {
                                  $notice_data[] = $row;


                               ?>
                               <tr id="datatable">
                                    <td><?php echo $row["date"]; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                
                                     <td><textarea name="" id="" cols="20" rows="2" readonly=""><?php echo $row["description"]; ?> </textarea>
                                    </td>

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
                             
                  <?php
                

                  $notice_data_js_array = json_encode($notice_data);

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
               
            
        <span id="message"></span>
                        <div class="form-group">
                           <label>Enter Notice Title</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="Enter Notice Title" />
                        </div>
                        <div class="form-group">
                      <label>description</label>
                       <textarea  name="description" id="description" class="form-control" placeholder="Enter  description "  required="" ></textarea>
                     </div>
                         <!--  <input type="hidden" id="user_id" /> -->
                              <input type="hidden" name="notice_id" id="notice_id" value="" class="btn btn-success" />

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


  $('#insert_form').on("submit", function(event){
           event.preventDefault();

                $.ajax({
                     url:"Crud/Users_notice/insert.php",
                     method:"POST",
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){
                          $('#insert').val("Inserting");
                     },
                     success:function(data){

                      if($.trim(data) == "Successfully Inserted Notice") {
                         $('#insert_form')[0].reset();
                       
                             alert(data);

                          
                          $('#add_data_Modal').modal().hide();

                          location.reload();
  
                  }
                  else if($.trim(data) == "Successfully Updated Notice") {
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
     $(document).on('click', '.edit_data', function(){

          var notice_id_chcek = $(this).attr("id");

          // $('#user_id').val(user_id);
          $('.modal-title').text("Update Notice Data");

          var notice_data_js_array_script = <?php echo json_encode($notice_data); ?>;
          $.each(notice_data_js_array_script,
            function(propName, propVal)
            {
            if(propVal['id']==notice_id_chcek){
               $('#modal-body').html("Update Notice");

             
                 $('#title').val(propVal['title']);
                 $('#description').val(propVal['description']);
                 $('#notice_id').val(propVal['id']);
                 $('#insert').val("Update");
                 $('#add_data_Modal').modal('show');
                 $('#insert').val("update");
                $('#actionValue').val('update');
            }

            })

      });
     
    
    
     $(document).on('click', '.delete_data', function(){
      if (confirm('Are you sure to Delete?')) {
           var notice_id = $(this).attr("id");
         
           if(notice_id != '')
           {
                $.ajax({
                     url:"Crud/Users_notice/delete.php",
                     method:"POST",
                     data:{notice_id:notice_id},
                     success:function(data){
                           // $('#userDataBody tbody').html(data);
                           alert(data);
                          location.reload();
                     }
                });
           } }
      });
     $(document).on('click', '.status', function(){
      if (confirm('Are you sure to Change status?')) {
        
           var notice_id = $(this).attr("id");
          
           if(notice_id != '')
           {
                $.ajax({
                     url:"Crud/Users_notice/change_status.php",
                     method:"POST",
                     data:{notice_id:notice_id},
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
