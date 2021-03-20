<?php 
$connect=mysqli_connect("localhost", "root", "", "ecommerce");
// $db=mysqli_select_db($connect,"ecommerce");
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 ?>
