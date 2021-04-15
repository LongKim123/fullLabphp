


	 <ul class="nav navbar-nav nav-flex-icons ml-auto">
                    
                    <ul class="nav navbar-nav nav-flex-icons ml-auto">
                    
                    	<?php 

						if(isset($_SESSION['user'])!=""){
						echo"
						 <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle waves-effect waves-light' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true'
                            aria-expanded='false'>
                            <i class='fa fa-user'></i>Xin Chào:".$_SESSION['user']."  </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenu1'>
                            
                            <a href='logout.php' class='dropdown-item waves-effect waves-light'>Đăng Xuất</a>
                        </div>
                    </li>";
                 }
                 else{
                 	echo" <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle waves-effect waves-light' id='dropdownMenu1' data-toggle='dropdown' aria-haspopup='true'
                            aria-expanded='false'>
                            <i class='fa fa-user'></i>Đăng nhập  </a>
                        <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenu1'>
                            
                            <a href='login.php' class='dropdown-item waves-effect waves-light'>Đăng Nhập</a>
                             <a href='signup.php' class='dropdown-item waves-effect waves-light'>Đăng Nhập</a>
                        </div>
                    </li>";
                 } 
                ?>
    </ul>
    </ul>


