
	<div	id="wrapper">
		<h2>Project trainning -website ban hang	</h2>
		<?php session_start();
		if(isset($_SESSION['user'])!=""){
			echo"<h2> Xin CHao:".$_SESSION['user']."<a href='logout.php'>LogOut</a></h2>";
		} else{
			echo"<h2> Ban Chua Dang Nhap<a href='login.php'>Login</a>-<a href='signup.php'>Register</a></h2>";

		}?>
		
	</div>
