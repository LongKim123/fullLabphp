
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
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
               <?php 
				require_once('product.class.php');
				 ?>
				 <?php 
				  if(!isset($_GET["cateid"])){
            		$pro=Product::list_product();
           		 }else{
           		 	$cateid=$_GET["cateid"];
           		 	$pro=Product::list_product_by_cateid($cateid);
           		 }
				
				 //$pro=Product::list_product();
				 foreach($pro as $item){
				 	
				 
				?>
                <!-- list group item -->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                        	<a href="product_detail.php?id= <?php echo $item["ProductID"];  ?>">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $item["ProductName"]; ?></h5></a>
                            <p class="font-italic text-muted mb-0 small"><?php echo $item["Description"]; ?></p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2"> <?php echo number_format($item["Price"]); ?> </h6>

                                <ul class="list-inline small">
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                               
                                </ul>

                            </div>
                            <button type="button" class="btn btn-primary" onclick="location.href='shopping_cart.php?id= <?php echo $item["ProductID"];  ?>'">Mua hang</button>
                        </div><img src="<?php echo $item["Picture"];  ?>" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
                <?php } ?>
            </ul> <!-- End -->
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