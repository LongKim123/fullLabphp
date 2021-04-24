<?php 	
include_once("header.php");
?>
<ul	>
	<li>
		<a href="list_product.php">Danh sach san pham</a>
	</li>	
	<li>
		<a href="add_product.php">Them san pham</a>
	</li>	
</ul>



<form method="post" enctype="multipart/form-data" class="bg-light p-4 m-4">
    <div class="form-group">
    <label for="yourmail"></label>
    <input type="text" class="form-control"name="id" value="<?php if(isset($_GET["id"])){
        echo $pro_de["ProductID"];
} ?>" placeholder="Nhập Ten san pham">
  </div>
  <div class="form-group">
    <label for="yourmail">Ten san pham</label>
    <input type="text" class="form-control"name="name" value="<?php if(isset($_GET["id"])){
        echo $pro_de["ProductName"];
} ?>" placeholder="Nhập Ten san pham">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Loai san pham</label>
    <select class="form-control" name="txtCateID" id="exampleFormControlSelect1" >
<option selected="<?php if(isset($pro_de)){
    echo $pro_de["CateID"];
} ?>"> <?php if(isset($pro_de)){
   $procate=Category::find_cate( $pro_de["CateID"]);
    echo $procate;
} ?></option>}
option
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
        <textarea class="form-control" id="exampleFormControlTextarea1" name="txtdesc" rows="3"><?php if(isset($_GET["id"])){
        echo $pro_de["Description"];
} ?> </textarea>
</div>
 
  <div class="form-group">
    <label for="yourmail">Gia ban</label>
    <input type="text"  name="txtprice"  value="<?php if(isset($_GET["id"])){
        echo $pro_de["Price"];
} ?>" class="form-control" placeholder="Nhập Gia san pham">
  </div>
    <div class="form-group">
    <label for="yourmail">So Luong</label>
    <input type="text"  value="<?php if(isset($_GET["id"])){
        echo $pro_de["Quantity"];
} ?>"  name="txtquantity" class="form-control"  placeholder="Nhập So luong san pham">
  </div>
  <div class="form-group">
        <input type="hidden"  value="<?php if(isset($_GET["id"])){
        echo $pro_de["ProductID"];
} ?>"  name="txtid" class="form-control"  placeholder="Nhập So luong san pham">
       
 </textarea>
</div>
<?php if(!isset($_GET["id"]))
{ ?>
 <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
 <?php }
else{ ?>

  <button type="submit" name="btnedit"  class="btn btn-primary">Sua</button>
<?php } ?>

</form>
