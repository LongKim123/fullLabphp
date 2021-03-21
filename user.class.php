<?php 	
require_once("connect.php");
class User
{
	public $userID;
	public $userName;
	public $email;
	public $password;
	public function __construct($u_name,$u_email,$u_pass){
		$this->userName=$u_name	;
		$this->email=$u_email;
		$this->password=$u_pass;
	}
	public function save(){
		
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$name=mysqli_real_escape_string($connect,$this->userName);
		$email=mysqli_real_escape_string($connect,$this->email);
		$password=md5(mysqli_real_escape_string($connect,$this->password));
		$sql ="INSERT INTO user(UserName,Email,Password) VALUES ('$name','$email','$password')";
		$result=mysqli_query($connect,$sql);
		return $result;
		

	}
	public static function checkLogin($email,$password){
		$password=md5($password);
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From user WHERE Email='$email' AND Password='$password' ";
		$result=mysqli_query($connect,$sql);
		while($item= mysqli_fetch_assoc($result)){
			$row[]=$item;
		}
		return $row;

	}
		
	

}
 ?>
