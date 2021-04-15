<?php 
session_start();
if(!isset($_SESSION['user'])){
	header("Location:listproduct_new.php");
}
session_destroy();
unset($_SESSION['user']) ;
header("Location:listproduct_new.php");?>