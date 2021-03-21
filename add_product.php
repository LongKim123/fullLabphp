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


 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Them san pham!</title>
    <style>
    	body {
    background: linear-gradient(to right, #c04848, #480048);
    min-height: 100vh
}

.text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
    	
    </style>
  </head>
  <body>
  	<form method="post" enctype="multipart/form-data" class="bg-light p-4 m-4">
  <div class="form-group">
    <label for="yourmail">Ten san pham</label>
    <input type="text" class="form-control" name="name" placeholder="Nhập Ten san pham">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Loai san pham</label>
    <select class="form-control" name="txtCateID" multiple id="exampleFormControlSelect1">
      	<?php
  	$procate=Category::cate_product();
	 foreach($procate as $item){
	 	echo "<option value=".$item["CateID"].">".$item["CategoeyName"]."</option>";
	 } 
  	 ?>
    </select>
</div>
<div class="form-group">
        <label for="exampleFormControlTextarea1">Nhập nội dung</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="txtdesc" rows="3"></textarea>
    </div>
    <div class="form-group">
    <label for="exampleFormControlFile1">Chọn file hinh</label>
    <input type="file" id="txtpic" required name="txtpic" accept=".PNG,.GIF,.JPG" class="form-control-file" >
</div>
  <div class="form-group">
    <label for="yourmail">Gia ban</label>
    <input type="text"  name="txtprice" class="form-control" placeholder="Nhập Gia san pham">
  </div>
    <div class="form-group">
    <label for="yourmail">So Luong</label>
    <input type="text"  name="txtquantity" class="form-control"  placeholder="Nhập So luong san pham">
  </div>
  
  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
</form>

	<div class="col-sm-9">
		<h2> Danh sach san pham</h2>
	<table class=" bg-light table table-condensed">

	<thead>
		<tr>
			<th>Ten san pham</th>
			<th>Hinh anh</th>
			<th>So Luong</th>
			<th>Gia Ban</th>
			<th>Mo Ta</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$pro=Product::list_product();
			foreach($pro as $proitem)
			{
			 ?>
		<tr>
			
			 			<td><?php echo $proitem["ProductName"] ?></td>
    					<td><img src="<?php echo $proitem["Picture"] ?>" style="width:100px;height=60px;" alt=""></td>
    					<td><?php echo $proitem["Quantity"] ?></td>
    					<td><?php echo $proitem["Price"] ?></td>
    					<td><?php echo $proitem["Description"] ?></td>
    					<td><button type="button" onclick="location.href='delete.php?id= <?php echo $proitem["ProductID"];  ?>'" class="btn btn-warning">Xoa</button > <button type="button" onclick="location.href='edit.php?id= <?php echo $proitem["ProductID"];  ?>'" class="btn btn-primary">Sua</button></td>
    				
			
			
		</tr>
		<?php } ?>
	</tbody>
</table>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
  