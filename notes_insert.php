
<?php
$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/admin/classes/User.php');
 $usr= new User();
 ?>
<?php

if(!empty($_POST))

{
     $name =$_POST["name"];
     $subject = $_POST["subject"];
     $description = $_POST["description"];
     $contact_no = $_POST["contact_no"];
      $result=$usr->add_users_note($name,$subject,$description,$contact_no);
          if(!$result){
           // echo 'Successfully Inserted';
           echo $result;

         }
         else{

             echo 'Failed to Insert';
         }

 }

?>
