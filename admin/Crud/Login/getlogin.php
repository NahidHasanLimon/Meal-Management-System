<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../../classes/User.php');
	$usr= new User();
if($_SERVER['REQUEST_METHOD']=='POST'){
     $email=$_POST['email'];
    $password=$_POST['password'];


    $admin_login=$usr->admin_login($email,$password);

}

?>
