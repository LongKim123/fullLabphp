<?php include_once('header.php') ;?>
<?php 

            require_once('category.class.php');
            require_once('product.class.php');
            $cate=Category::cate_product();
            session_start();
            error_reporting(E_ALL);
            ini_set('display_errors','1');
            if(isset($_GET["id"])){
            	$pro_id=$_GET["id"];
            	$was_found=false;
            	$i=0;
            	if(!isset($_SESSION["cart_item"]) ||count($_SESSION["cart_item"])<1){
            		$_SESSION["cart_item"]= array(0=>array("pro_id"=>$pro_id,"quantity"=>1));
            	}
            	else{
            		foreach($_SESSION["cart_item"] as $item){
            			$i++;
            			while(list($key,$value)=each($item)){
            				if($key=="pro_id" && $value==$pro_id){
            					array_splice($_SESSION["cart_item"], $i-1,1,array(array("pro_id"=>$pro_id,"quantity"=>$item["quantity"]+1)));
            					$was_found=true;
            				}
            			}
            		}
            		if($was_found==false){
            			array_push($_SESSION["cart_item"], array("pro_id"=>$pro_id,"quantity"=>1));
            		}
            	}
            	header("location:shopping_cart.php");
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

    <title>Hello, world!</title>
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
    <div class="container py-5">
    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4"><?php  include_once("header.php"); 
            require_once('category.class.php');
            	$cate=Category::cate_product();
            ?></h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-3">
    		<h3>Danh muc</h3>
    		<ul class="list-group">
    			<li class="list-group-item"><a href="list_product.php"> All</a></li>
    			<?php foreach($cate as $cateitem)
    			{ ?>
    			<li class="list-group-item"><a href="list_product.php?cateid=<?php echo $cateitem["CateID"] ?> " > <?php echo $cateitem["CategoeyName"]  ?></a></li>
    		<?php } ?>

    		</ul>
    		
    	</div>
    	<div class="col-sm-9">
    		<h3>Thong tin gio hang</h3>
    		<table  class=" bg-light table table-condensed">
    			<caption>Thong tin gio hang cua ban</caption>
    			<thead>
    				<tr>
    					<th>Ten San Pham</th>
    					<th>Hinh Anh</th>
    					<th>So Luong</th>
    					<th>Don Gia</th>
    					<th>Thanh tien</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php
    					$total=0;
    					 if(isset($_SESSION["cart_item"]) && count($_SESSION["cart_item"])>0)
    					{
    					foreach($_SESSION["cart_item"] as $item) 
    						{
    							$id=$item["pro_id"];
    							$product=Product::get_product($id);
    							$prod=reset($product);
    							$total +=$item["quantity"]*$prod["Price"];
    							?>
    				<tr>
    					
    					<td><?php echo $prod["ProductName"] ?></td>
    					<td><img src="<?php echo $prod["Picture"] ?>" style="width:100px;height=60px;" alt=""></td>
    					<td><?php echo $item["quantity"] ?></td>
    					<td><?php echo $prod["Price"] ?></td>
    					<td><?php echo $prod["Price"]*$item["quantity"] ?></td>
    				
    				</tr>
    				
    				<?php
    				}
    				 }
    				 else{
    				 	echo "Khong co san pham nao";
    				 } ?>


    			</tbody>
    		</table>
    		 <p class="bg-light">Tong tien la <?php echo number_format($total); ?> VND</p>
    		<a href="list_product.php" ><input class="btn btn-primary" type="text" value="Tiep tuc mua hang"></a>
    		
    	</div>
        
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>