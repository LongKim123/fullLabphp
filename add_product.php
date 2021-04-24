<?php require_once('product.class.php');
	require_once('category.class.php');
if(isset($_POST["btnsubmit"])){
 
	$name=$_POST["name"];
	$CateID=$_POST["txtCateID"];
	$namsinh=$_POST["namsinh"];
	$chuyennganh=$_POST["chuyennganh"];
	$banthan=$_POST["gioithieu"];
  $maso=$_POST["maso"];
	$newProduct= new Product($name,$CateID,$namsinh,$chuyennganh,$banthan,$maso);
	$result=$newProduct->save();
    if($result){
     header("Location:add_product.php");
   }
   else{
    echo "ko dk";
   }


}
if(isset($_POST["btnedit"])){
  $id=$_POST["id"];
  $name=$_POST["name"];
  $CateID=$_POST["txtCateID"];
  $namsinh=$_POST["namsinh"];
  $chuyennganh=$_POST["chuyennganh"];
  $banthan=$_POST["gioithieu"];
  $maso=$_POST["maso"];
  $newProduct= new Product($name,$CateID,$namsinh,$chuyennganh,$banthan,$maso);
  $result=$newProduct->update($id);
  if($result){
    header("Location:add_product.php");
  }
}



?> 
<?php 	
include_once("header.php"); ?>
 <?php 	
 if(isset($_GET["inserted"])){
 	echo   "<h2>Them san pham thanh cong</h2>";
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
    <?php if(isset($_GET["id"])){
    $id=$_GET["id"];
    $pro_de=Product::get_product($id);
   
}
 ?>


    <h1>Form Them Sinh Vien</h1>
  	<form method="post" enctype="multipart/form-data" class="bg-light p-4 m-2">
  
  <div class="form-group">
    <label for="yourmail">Ten Sinh Vien</label>
    <input type="text" class="form-control"name="name" value="" placeholder="Nhập Ten sinh vien">
  </div>
   <div class="form-group">
    <label for="yourmail">Ma So Sinh Vien</label>
    <input type="text"  name="maso"  value="" class="form-control" placeholder="Nhập Ma So">
  </div>
    <div class="form-group">
    <label for="yourmail">Nam Sinh</label>
    <input type="text"  name="namsinh"  value="" class="form-control" placeholder="Nhập Ma So">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tinh thanh</label>
    <select class="form-control" name="txtCateID" id="exampleFormControlSelect1" >

      	<?php
  	$procate=Category::cate_product();
	 foreach($procate as $item){
	 	echo "<option value=".$item["CateID"].">".$item["CategoeyName"]."</option>";
	 } 
  	 ?>
    </select>
</div>
  <div class="form-group">
    <label for="yourmail">Chuyen Nganh</label>
    <input type="text"  name="chuyennganh"  value="" class="form-control" placeholder="Nhập chuyen nganh">
  </div>
<div class="form-group">
        <label for="exampleFormControlTextarea1">Nhập nội dung Ban Than</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="gioithieu" rows="3"></textarea>
</div>
 
 


 <button type="button" name="btnsubmit" class="btn btn-primary">Them Sinh Vien</button>


</form>
<?php if(isset($_GET["id"])){
  ?>
  <h1>Form Sua Sinh Vien</h1>
<form method="post" enctype="multipart/form-data" class="bg-light p-4 m-2">
  
  <div class="form-group">
    <label for="yourmail">Ten Sinh Vien</label>
    <input type="text" class="form-control"name="name" value="<?php echo $pro_de["ProductName"] ; ?>" placeholder="Nhập Ten sinh vien">
  </div>
   <div class="form-group">
    <label for="yourmail">Ma So Sinh Vien</label>
    <input type="text"  name="maso"  value="<?php echo $pro_de["maso"] ; ?>" class="form-control" placeholder="Nhập Ma So">
  </div>
    <div class="form-group">
    <label for="yourmail">Nam Sinh</label>
    <input type="text"  name="namsinh"  value="<?php echo $pro_de["namsinh"] ; ?>" class="form-control" placeholder="Nhập Ma So">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tinh thanh</label>
    <select class="form-control" name="txtCateID" id="exampleFormControlSelect1" >
      <option selected value="<?php echo $pro_de['CateID']; ?>">    <?php if(isset($pro_de)){
               $procate=Category::find_cate( $pro_de["CateID"] );
                echo $procate;
            } ?></option>
        <?php
    $procate=Category::cate_product();
   foreach($procate as $item){
    echo "<option value=".$item["CateID"].">".$item["CategoeyName"]."</option>";
   } 
     ?>
    </select>
</div>
  <div class="form-group">
    <label for="yourmail">Chuyen Nganh</label>
    <input type="text"  name="chuyennganh"  value="<?php echo $pro_de["chuyennganh"] ; ?>" class="form-control" placeholder="Nhập chuyen nganh">
  </div>
  <input type="hidden" name="id" value="<?php echo $pro_de["ProductID"] ; ?>">
<div class="form-group">
        <label for="exampleFormControlTextarea1">Nhập nội dung Ban Than</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="gioithieu" rows="3"><?php echo $pro_de["banthan"] ; ?></textarea>
</div>
 
 


 <button type="submit" name="btnedit" class="btn btn-primary">Sua Sinh Vien</button>


</form>
<?php } ?>


	<div class="col-sm-9">
		<h2> Danh sach Sinh Vien</h2>
	<table class=" bg-light table table-condensed">

	<thead>
		<tr>
      <th>STT</th>
			<th>Ten Sinh Vien</th>
			<th>Ma So</th>
			<th>Nam Sinh</th>
			<th>Noi Sinh THuoc Tinh</th>
			<th>Chuyen Nganh</th>
			<th>Gioi Thieu Ban THan</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$pro=Product::list_product();
			foreach($pro as $proitem)
			{
			 ?>
		<tr>    <td><?php echo $proitem["ProductID"] ?> </td>
			     
			 			<td><?php echo $proitem["ProductName"] ?></td>
            <td><?php echo $proitem["maso"] ?></td>
            <td><?php echo $proitem["namsinh"] ?></td>
    					<td>
           <?php if(isset($pro)){
               $procate=Category::find_cate( $proitem["CateID"] );
                echo $procate;
            } ?>     
              </td>
    					
    					<td><?php echo $proitem["chuyennganh"] ?></td>
    					<td><?php echo $proitem["banthan"] ?></td>
    					<td> <td> <button class="btn btn-primary" onclick="location.href='add_product.php?id= <?php echo $proitem["ProductID"];  ?>'">Sua</button>
                <button type="button" onclick="location.href='delete.php?id= <?php echo $proitem["ProductID"];  ?>'" class="btn btn-warning">Xoa</button > </td>
    				
			
			
		</tr>
		<?php } ?>
	</tbody>
</table>

</div>
<div class="col-sm-9">
    <h2> Danh sach Giang Vien </h2>
  <table class=" bg-light table table-condensed">

  <thead>
    <tr>
      <th>ID</th>
      <th>Ten Giang Vien</th>   
      <th>Ma So </th>
      <th>Nam Sinh</th>
      <th>Noi Sinh</th>
      <th>Hoc Vi</th>
      <th>Linh Vuc</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      require_once('giangvien.class.php');
      $pro=giangvien::get_gv();
      foreach($pro as $gv)
      {
       ?>
    <tr>    <td> <?php echo $gv["id"] ?></td>
           
            <td><?php echo $gv["name"] ?></td>
              
              <td><?php echo $gv["MaSo"] ?></td>
              <td><?php echo $gv["namsinh"] ?></td>
              <td> <?php if(isset($pro)){
               $procate=Category::find_cate( $proitem["CateID"] );
                echo $procate;
            } ?> </td>
              <td><?php echo $gv["hocvi"] ?></td>
              <td><?php echo $gv["linhvuc"] ?></td>
              
            
      
      
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
  