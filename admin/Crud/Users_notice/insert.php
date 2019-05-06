 
<?php 
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../classes/User.php');
  $usr= new User();
  ?>
 <?php  

 if(!empty($_POST))  
 
 {  
    
      $title = $_POST["title"];  
      $description = $_POST["description"];  
     
      if($_POST['actionValue']=="update")
      {
          $notice_id =$_POST["notice_id"];  
        
          $result=$usr->update_notice($notice_id,$title,$description);
      
           if(!$result){ 
            echo $result;
            
        
          }
          else{
          
                echo $result;
          }
    } else {

          $result=$usr->add_notice($title,$description);
           if(!$result){ 
             echo $result;
           
        
          }
          else{
          
                echo $result;
          }
    }
  }
   
 ?>
 