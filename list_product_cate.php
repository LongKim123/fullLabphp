 <section class="section">
                          <?php 
                           
                        
                        if(!isset($_GET["cateid"])){
                        ?>
                    <h1 class="section-heading">Danh Sách Tất Cả Sản Phẩm</h1>
                    <?php
                     }
                     else{
                       $cateid=$_GET["cateid"];
                      $cate_name=Category::find_cate($cateid);
                     ?>
                        <h1 class="section-heading">Danh Sách Sản Phẩm <?php 
                         echo $cate_name ?></h1>
                        
                     <?php

                 }?>
                      <?php 
                            require_once('product.class.php');
                        ?>

             
                    <div class="row">
                        
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
                        
                        <div class="col-lg-4 col-md-6 mb-r">
                            <div class="card text-center card-cascade narrower">
                                <div class="view overlay hm-white-slight z-depth-1">
                                 
                                    <img src="<?php echo $item['Picture']; ?>"
                                        class="img-fluid" style=" width: 300px;height:450px;"  alt="" />

                                    <a href="listproduct_new.php?id= <?php echo $item["ProductID"];  ?>">
                                        <div class="mask waves-light waves-effect waves-light"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <strong>
                                            <a><?php echo $item["ProductName"]; ?></a>
                                        </strong>
                                    </h4>
                                    <ul class="rating">
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <p class="card-text">
                                       <?php echo $item["Description"]; ?>
                                    </p>
                                    <div class="card-footer">
                                        <span class="left"><?php echo $item["Price"]; ?></span>
                                        <span class="right">
                                            <a  class="btn-floating blue-gradient" onclick="location.href='shopping_cart.php?id= <?php echo $item["ProductID"];  ?>'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                        }
                        ?>

                    </div>
                </section>