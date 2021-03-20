<?php require_once('product.class.php');
	require_once('category.class.php');
if(isset($_POST["btnsubmit"])){
	$productName=$_POST["name"];
	$CateID=$_POST["txtCateID"];
	$description=$_POST["txtdesc"];
	$price=$_POST["txtprice"];
	$quantity=$_POST["txtquantity"];
	$picture=$_FILES["txtpic"];
	$newProduct= new Product($productName,$CateID,$price,$quantity,$description,$picture);
	$result=$newProduct->save();

}
?>
<?php 	
include_once("header.php"); ?>
 <?php 	
 if(isset($_GET["inserted"])){
 	echo "<h2>Them san pham thanh cong</h2>";
 }
  ?>
  <form method="post" enctype="multipart/form-data">
  	
  	<input type="text" name="name" />
  	<select name="txtCateID" multiple>
  	<?php
  	$procate=Category::cate_product();
	 foreach($procate as $item){
	 	echo "<option value=".$item["CateID"].">".$item["CategoeyName"]."</option>";
	 } 
  	 ?>
  	 </select>
  	<input type="text" name="txtdesc" />
  	<input type="text" name="txtprice" />
  	<input type="text" name="txtquantity" />
  	<input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG" />
  	<input type="submit" name="btnsubmit" value="them san pham">
  </form>