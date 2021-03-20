
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
head,
body {
    background-color: #FFCCBC
}

.container {
    margin-top: 40px;
    margin-bottom: 40px
}

img {
    width: 100%
}

.card-title {
    justify-content: space-between;
    margin-top: 25px
}

.register {
    font-size: 10px;
    position: relative;
    bottom: 5px
}

.cvc {
    width: 2.5em;
    position: absolute
}

input {
    border: none;
    padding-left: 4px;
    background-color: #f7f1f1;
    font-size: 15px
}

.card-body {
    background-color: #f7f1f1
}

.footer {
    background-color: #00BCD4;
    color: white
}

.footer:hover {
    cursor: pointer;
    background-color: #0097A7
}

.numbr {
    border-bottom: 1px solid #c1bcbc;
    padding-bottom: 8px
}

.line2 {
    border-bottom: 1px solid #c1bcbc;
    padding-bottom: 8px;
    padding-left: 0px
}

input.focus,
input:focus {
    outline: 0;
    box-shadow: none !important
}

.numbr.numbr.hover,
.numbr:hover {
    border-bottom: 1px solid aqua
}

.line2.hover,
.line2:hover {
    border-bottom: 1px solid aqua
}

.fa-lock {
    margin-right: 10px
}

.order {
    margin-top: 10px
}
        
    </style>
  </head>
  <body>
    <div class="container py-5">
    <div class="row text-center text-white mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4"><?php  include_once("header.php"); 
            require_once('category.class.php');
            require_once('product.class.php');
                $cate=Category::cate_product();
                $id=$_GET["id"];
                $pro_de=reset(Product::get_product($id));

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
 
    <div class="card mx-auto col-md-5 col-8 mt-3 p-0"> <img class='mx-auto pic' src="https://i.imgur.com/kXUgBQZ.jpg" />
        <div class="card-title d-flex px-4">
            <p class="item text-muted">  <label class="register">&reg;</label> Chair</p>
            <p>$5760</p>
        </div>
        <div class="card-body">
            <p class="text-muted">Your payment details</p>
            <div class="numbr mb-3"> <i class=" col-1 fas fa-credit-card text-muted p-0"></i> <input class="col-10 p-0" type="text" placeholder="Card Number"> </div>
            <div class="line2 col-lg-12 col-12 mb-4"> <i class="col-1 far fa-calendar-minus text-muted p-0"></i> <input class="cal col-5 p-0" type="text" placeholder="MM/YY"> <i class="col-1 fas fa-lock text-muted"></i> <input class="cvc col-5 p-0" type="text" placeholder="CVC"> </div>
        </div>
        <div class="footer text-center p-0">
            <div class="col-lg-12 col-12 p-0">
                <p class="order">Order Now</p>
            </div>
        </div>
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