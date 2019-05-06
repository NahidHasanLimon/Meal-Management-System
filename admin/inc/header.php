<?php

 $filepath = realpath(dirname(__FILE__));
	// include_once ($filepath.'/../lib/Session.php');
	//  Session::init();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
/*
	include_once ($filepath.'/../classes/User.php');
	include_once ($filepath.'/../classes/exam.php');
	include_once ($filepath.'/../classes/process.php');
	include_once ($filepath.'/../classes/exam.php');
	*/
 spl_autoload_register(function($class){
    include_once "classes/".$class.".php";

	});

	$db = new Database();
  $fm = new Format();
  $usr = new User();

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Meal management</title>
    <?php
      include_once ($filepath.'/styles.php');
     ?>


  </head>

<?php 
        Session::checkAdminSession();
 ?>

	 <?php
      if (isset($_GET['action']) && $_GET['action']=='logout') {
              Session::destroy();
      header("Location:login.php");
      exit();
    }
?>
