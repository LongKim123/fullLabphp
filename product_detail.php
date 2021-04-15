<style>
body {
  background-color: #fdf1ec;
}

.wrapper {
  height: 420px;
  width: 654px;
  margin: 50px auto;
  border-radius: 7px 7px 7px 7px;
  /* VIA CSS MATIC https://goo.gl/cIbnS */
  -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
}

.product-img {
  float: left;
  height: 420px;
  width: 327px;
}

.product-img img {
  border-radius: 7px 0 0 7px;
}

.product-info {
  float: left;
  height: 420px;
  width: 327px;
  border-radius: 0 7px 10px 7px;
  background-color: #ffffff;
}

.product-text {
  height: 300px;
  width: 327px;
}

.product-text h1 {
  margin: 0 0 0 38px;
  padding-top: 52px;
  font-size: 34px;
  color: #474747;
}

.product-text h1,
.product-price-btn p {
  font-family: 'Bentham', serif;
}

.product-text h2 {
  margin: 0 0 47px 38px;
  font-size: 13px;
  font-family: 'Raleway', sans-serif;
  font-weight: 400;
  text-transform: uppercase;
  color: #d2d2d2;
  letter-spacing: 0.2em;
}

.product-text p {
  height: 125px;
  margin: 0 0 0 38px;
  font-family: 'Playfair Display', serif;
  color: #8d8d8d;
  line-height: 1.7em;
  font-size: 15px;
  font-weight: lighter;
  overflow: hidden;
}

.product-price-btn {
  height: 103px;
  width: 291px;
  margin-top: 17px;
  position: relative;
}

.product-price-btn p {
  display: inline-block;
  position: absolute;
  top: -100px;
  height: 50px;
  font-family: 'Trocchi', serif;
  margin: 0 0 0 38px;
  font-size: 28px;
  font-weight: lighter;
  color: #474747;
}

span {
  display: inline-block;
  height: 50px;
  font-family: 'Suranna', serif;
  font-size: 34px;
}

.product-price-btn button {
  float: right;
  display: inline-block;
  height: 50px;
  width: 200px;
  margin: 30px 40px 0 16px;
  box-sizing: border-box;
  border: transparent;
  border-radius: 60px;
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.2em;
  color: #ffffff;
  background-color: #9cebd5;
  cursor: pointer;
  outline: none;
}

.product-price-btn button:hover {
  background-color: #79b0a1;
}  
</style>

 <div class="wrapper">
    <div class="product-img">
      <img src="<?php echo  $pro_de['Picture'] ; ?>" height="420" width="327">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1><b><?php echo $pro_de["ProductName"];?></b></h1>
       
        <p><?php echo $pro_de["Description"];?><br> functional objects. The surfaces<br> appear to be sliced and pulled aside,<br> allowing room for growth. </p>
      </div>
      <div class="product-price-btn">
        <p><span><?php echo number_format($pro_de["Price"]);?></span>VNĐ</p>
        <button type="button" onclick="location.href='shopping_cart.php?id= <?php echo $pro_de["ProductID"];  ?>'">buy now</button>
      </div>
    </div>
  </div>

    <div class="row">
     

   

      
    </div>
    <div class="row">
         <h2><b>Sản Phẩm Liên Quan</b></h2>
        
    </div>
    <div class="row">
       
        <?php
       
        foreach($pro_relate as $proitem)
        {
        ?>
        <a href="listproduct_new.php?id= <?php echo $proitem["ProductID"];  ?>">
         <div class="col-sm-4">

            <img src="<?php echo $proitem['Picture'] ?>" class="img-repsponsive" style="width:250px;
            height: 350px;" alt="">
           
            <p class="text-danger" style=" width:200px;"><b> <?php echo $proitem["ProductName"] ?></b></p>
              <p class="text-info"> <b><?php echo number_format($proitem["Price"] )?></b></p>
              <p style="width:200px;"><button type="button"  class="btn btn-primary">Chi Tiêt</button></p>
        </div>
    </a>
        <?php
    } ?>
    </div>

