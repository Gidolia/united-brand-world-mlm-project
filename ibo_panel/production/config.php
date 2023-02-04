<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
include "../../database_connect.php";
$que="SELECT * FROM `distributor` WHERE `d_id`='$_SESSION[d_id]' AND `password`='$_SESSION[d_password]'";
$res=$con->query($que);
  if ($res->num_rows != 1)
  {     
      echo "<script>location.href='../../login.php';</script>";
		      //echo "<script>location.href='../../try.php';</script>";
  }
  else{
      include("functions.php");
	  include("template_function.php");
	  
	  $d_detail=mysqli_fetch_assoc($res);
  }			  
?>