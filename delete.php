<?php 
require_once('product.class.php');

	$id=$_GET["id"];
	$del=Product::del_product($id);
	if($del){
		header("Location:add_product.php");
	}
	else{
		echo "khong thanh cong";
	}
	



 ?>