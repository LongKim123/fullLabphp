<?php require_once('product.class.php');
	require_once('category.class.php');
if(isset($_POST["btnsubmit"])){
  $id=$_GET["id"];
	$productName=$_POST["name"];
	$CateID=$_POST["txtCateID"];
	$description=$_POST["txtdesc"];
	$price=$_POST["txtprice"];
	$quantity=$_POST["txtquantity"];
  if(empty($_FILES["txtpic"]))
  {
      $picture=$_POST["txtpic1"];
   
  }
  else{
     $picture=$_FILES["txtpic"];
   
  }
	
	$newProduct= new Product($productName,$CateID,$price,$quantity,$description,$picture);
	$result=$newProduct->update($id);
  if($result){
    header("Location:add_product.php");
  }

}

?>

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

    <title>Form Edit !</title>
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
    <?php 

                $id=$_GET["id"];
                $pro_de=Product::get_product($id); ?>
    <h2> Form Sua San Pham</h2>
  	<form method="post" enctype="multipart/form-data" class="bg-light p-4 m-4">
  <div class="form-group">
    <label for="yourmail">Ten san pham</label>
    <input type="text" value="<?php echo $pro_de["ProductName"]; ?>" class="form-control" name="name" placeholder="Nhập Ten san pham">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Loai san pham</label>
    <select class="form-control" name="txtCateID" multiple id="exampleFormControlSelect1">

        <option selected value="<?php echo $pro_de['CateID']; ?>"></option>
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
        <textarea class="form-control" id="exampleFormControlTextarea1" name="txtdesc" rows="3"><?php echo $pro_de["Description"]; ?></textarea>
    </div>
    <div class="form-group">
    <label for="exampleFormControlFile1">Chọn file hinh</label>
    <input type="file" id="txtpic" required  name="txtpic" accept=".PNG,.GIF,.JPG" class="form-control-file" >
</div>
  <div class="form-group">
   <input type="hidden" name="txtpic1" value="<?php echo $pro_de["Picture"];?>">
    <img type="text" src="<?php echo $pro_de["Picture"];?>" >
</div>
  <div class="form-group">
    <label for="yourmail">Gia ban</label>
    <input type="text" value="<?php echo $pro_de["Price"];?>"  name="txtprice" class="form-control" placeholder="Nhập Gia san pham">
  </div>
    <div class="form-group">
    <label for="yourmail">So Luong</label>
    <input type="text" value="<?php echo $pro_de["Quantity"];?>"  name="txtquantity" class="form-control"  placeholder="Nhập So luong san pham">
  </div>
  
  <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
</form>

	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
  