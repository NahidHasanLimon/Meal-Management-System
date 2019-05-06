// Call the dataTables jQuery plugin
// $(document).ready(function() {
//   $('#dataTable').DataTable();
// });

$(document).ready(function(){
  // $( "#datepicker" ).datepicker({
 $('#date_picker').datepicker({
 // dateFormat: "yy-mm-dd",
 	dateFormat: 'yy-mm',
 	  startView: "months",
        minViewMode: "months",

  	minViewMode: 1,
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, date='')
 {
  var dataTable = $('#dataTable').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"Crud/datatable/fetch.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, date:date
    }
   }
  });
 }

 $('#search').click(function(){
  var date = $('#date_picker').val();

  if(date != '')
  {
  	// alert(date);
   $('#dataTable').DataTable().destroy();
    fetch_data('yes', date);
  }
  else
  {
   alert("Choosing Date is Required");
  }
 }); 
 
});
