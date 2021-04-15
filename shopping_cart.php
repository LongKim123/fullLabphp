
<?php 

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>React App</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Customizer -->
    <link rel="stylesheet" href="https://mdbootstrap.com/live/_MDB/css/customizer.min.css">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="hidden-sn animated deep-purple-skin">
    <div>
        <!-- Header -->
        <header>
            <ul id="slide-out" class="side-nav hidden custom-scrollbar sn-bg-2 ps ps--theme_default" data-ps-id="c27390a3-9efc-e0d8-197a-ab96d73a156a">
                <li>
                    <div class="logo-wrapper waves-light waves-effect waves-light">
                        <a>
                            <img src="http://mdbootstrap.com/img/logo/mdb-transparent.png" alt="" class="img-fluid flex-center" />
                        </a>
                    </div>
                </li>
                <li>
                    <ul class="social">
                        <li>
                            <a class="icons-sm fb-ic">
                                <i class="fa fa-facebook"> </i>
                            </a>
                        </li>
                        <li>
                            <a class="icons-sm pin-ic">
                                <i class="fa fa-pinterest"> </i>
                            </a>
                        </li>
                        <li>
                            <a class="icons-sm gplus-ic">
                                <i class="fa fa-google-plus"> </i>
                            </a>
                        </li>
                        <li>
                            <a class="icons-sm tw-ic">
                                <i class="fa fa-twitter"> </i>
                            </a>
                        </li>
                    </ul>
                </li>
            
                <li>

                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a href="listproduct_new.php" class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-shopping-bag"></i> All Product Page
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                          
                        </li>
                        <li class="active">
                            <a class="collapsible-header waves-effect arrow-r active">
                                <i class="fa fa-shopping-cart"></i> Cart Pages
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                          
                        </li>
                     
                      
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-diamond"></i> Category Pages
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <?php  require_once('category.class.php');
                            $cate=Category::cate_product();?>
                            <div class="collapsible-body">
                                <ul>
                                        <?php foreach($cate as $cateitem)
                                         { ?>
                                    <li>
                                       <a  class="waves-effect" href="listproduct_new.php?cateid=<?php echo $cateitem["CateID"] ?> " > <?php echo $cateitem["CategoeyName"]  ?></a>
                                    </li>
                                    <?php
                                }?>
                               
                                </ul>
                            </div>
                        </li>
                    </ul>

                </li>

                <div class="sidenav-bg mask-strong"></div>

                <div class="ps__scrollbar-x-rail">
                    <div class="ps__scrollbar-x" tabIndex="0"></div>
                </div>
                <div class="ps__scrollbar-y-rail">
                    <div class="ps__scrollbar-y" tabIndex="0"></div>
                </div>
            </ul>

            <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg navbar-dark scrolling-navbar double-nav">

                <div class="float-left">
                    <a data-activates="slide-out" class="button-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>

                <div class="breadcrumb-dn mr-auto">
                    <ol class="breadcrumb header-breadcrumb">
                        <li class="breadcrumb-item">
                            <a>Trang Chủ</a>
                        </li>
                    </ol>
                </div>

               <?php
               include_once("header.php");  ?>

            </nav>

        </header>
        <main id="mainContainer">
            <div class="container">
                <!-- Products -->
               
                <h3>
                    <span class="badge amber darken-2">Thông tin giỏ hàng !</span>
                </h3>
             
                <!-- Cart -->
                <section class="section">
                    <div class="table-responsive">
                        <table class="table product-table">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Cộng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 require_once('product.class.php');
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
                                    <th scope="row">
                                        <img style="width:100px;height: 150px;" src="<?php echo $prod["Picture"] ?>" 
                                            alt="" class="img-fluid z-depth-0" />
                                    </th>
                                    <td>
                                        <h5>
                                            <strong><?php echo $prod["ProductName"] ?></strong>
                                        </h5>
                                    </td>
                                    <td><?php echo $prod["Price"] ?></td>
                                    <td class="center-on-small-only">
                                        <span class="qty"><?php echo $item["quantity"] ?> </span>
                                               <div class="btn-group radio-group" data-toggle="buttons">
                                            <label class="btn btn-sm btn-primary
                                                btn-rounded waves-effect waves-light">
                                                <a>—</a>
                                            </label>
                                            <label class="btn btn-sm btn-primary
                                                btn-rounded waves-effect waves-light">
                                                <a>+</a>
                                            </label>
                                        </div>
                                    </td>
                                    <td><?php echo $prod["Price"]*$item["quantity"] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Remove item">
                                            X
                                        </button>
                                    </td>
                                </tr>
                                <?php
                             } 
                         }?>
                                <tr>
                                    <td colSpan="3"></td>
                                    <td>
                                        <h4>
                                            <strong>Tổng Tiền</strong>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4>
                                            <strong><?php echo number_format($total); ?> VND</strong>
                                        </h4>
                                    </td>
                                    <td colSpan="3">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">Thanh toán
                                            <i class="fa fa-angle-right right"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </main>
        <!-- Footer -->
        <footer class="page-footer center-on-small-only">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 ml-auto">
                        <h5 class="title social-section-title">Social Media</h5>
                        <div class="social-section text-md-left">
                            <ul class="text-center">
                                <li>
                                    <a class="btn-floating  btn-fb waves-effect waves-light">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-floating  btn-ins waves-effect waves-light">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-floating  btn-tw waves-effect waves-light">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-floating  btn-yt waves-effect waves-light">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-floating  btn-li waves-effect waves-light">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-floating  btn-dribbble waves-effect waves-light">
                                        <i class="fa fa-dribbble left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-floating  btn-pin waves-effect waves-light">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="btn-floating  btn-gplus waves-effect waves-light">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="title">Delivery</h5>
                        <ul>
                            <li>
                                <a>Store Delivery</a>
                            </li>
                            <li>
                                <a>Online Delivery</a>
                            </li>
                            <li>
                                <a>Delivery Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a>Tracking</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="title">Need help?</h5>
                        <ul>
                            <li>
                                <a>FAQ</a>
                            </li>
                            <li>
                                <a>Contact Us</a>
                            </li>
                            <li>
                                <a>Return Policy</a>
                            </li>
                            <li>
                                <a>Product Registration</a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-lg-4">
                        <h5 class="title">Instagram Photos</h5>
                        <ul class="instagram-photos">
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(19).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(16).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(5).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(18).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(15).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img class="img-fluid" src="http://mdbootstrap.com/img/Photos/Avatars/img%20(17).jpg" alt="" />
                                    <a>
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container-fluid">
                    © 2016 Copyright:
                    <a href="http://www.MDBootstrap.com"> MDBootstrap.com </a>
                </div>
            </div>
        </footer>
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Customizer -->
    <script type="text/javascript" src="https://mdbootstrap.com/live/_MDB/js/customizer.min.js"></script>
    <!-- Custom -->
    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
</body>

</html>