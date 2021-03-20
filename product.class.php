<?php 	
require_once("connect.php");
class Product
{
	public $productID;
	public $productName;
	public $CateID;
	public $price;
	public $quantity;
	public $description;
	public	$picture;
	public function __construct($pro_name,$cate_id,$price,$quantity,$desc,$picture	){
		$this->productName=$pro_name	;
		$this->CateID=$cate_id;
		$this->price=$price;
		$this->quantity	=$quantity	;
		$this->description	=$desc;
		$this->picture=$picture;
	}
	public function save(){
		$file_temp=$this->picture['tmp_name'];
		$user_file=$this->picture['name'];
		$timestamp=date("Y").date("m").date("d").date("h").date("i").date("s");
		$file_path="uploads/".$timestamp.$user_file;
		if(move_uploaded_file($file_temp,$file_path)==false)
		{
			return false;
		}
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		if($connect === true){
    		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
		$sql ="INSERT INTO product(ProductName,CateID, Price, Quantity,Description,Picture) VALUES ('$this->productName','$this->CateID','$this->price','$this->quantity','$this->description','$file_path')";
		$result=mysqli_query($connect,$sql);
		return $result;

	}
	public static function list_product(){
		$row=array();
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From product";
		$result=mysqli_query($connect,$sql);
		while($item= mysqli_fetch_assoc($result)){
			$row[]=$item;
		}
		return $row;
	}
	public static function list_product_by_cateid($cateid){
		$row=array();
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From product WHERE CateID='$cateid' ";
		$result=mysqli_query($connect,$sql);
		while($item= mysqli_fetch_assoc($result)){
			$row[]=$item;
		}
		return $row;
	}

		public static function get_product($id){
		$row=array();
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From product WHERE ProductID='$id' ";
		$result=mysqli_query($connect,$sql);
		while($item= mysqli_fetch_assoc($result)){
			$row[]=$item;
		}
		return $row;
	}
	public static function list_product_ralate($cateid,$id){
		$row=array();
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From product WHERE  ProductID !='$id' And CateID='$cateid' ";
		$result=mysqli_query($connect,$sql);
		while($item= mysqli_fetch_assoc($result)){
			$row[]=$item;
		}
		return $row;
	}


}
 ?>
