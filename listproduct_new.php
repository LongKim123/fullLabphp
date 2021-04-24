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
<?php session_start();?>
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
                            <a href="shopping_cart.php" class="collapsible-header waves-effect arrow-r active">
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
               <?php 
                require_once('product.class.php');
               if(isset($_GET["id"])){

                
                $id=$_GET["id"];
                $pro_de =Product::get_product($id);
                $pro_relate=Product::list_product_ralate($pro_de["CateID"],$id);

                include("product_detail.php");
                }
                 else{
                 require_once('list_product_cate.php');
            }?>
             
                <!-- Cart -->
               
            </div>
        </main>
        <!-- Footer -->
       <?php
       require_once('footer.php');
       ?>
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