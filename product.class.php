<?php 	

class Product
{
	public $ID;
	public $Name;
	public $CateID;
	public $namsinh;
	public $chuyennganh;
	public $banthan;
	public	$maso;
	public function __construct($name,$cate_id,$namsinh,$chuyennganh,$banthan,$maso	){
		
		$this->Name=$name;
		$this->CateID=$cate_id;
		$this->namsinh=$namsinh;
		$this->chuyennganh=$chuyennganh	;
		$this->banthan=$banthan;
		$this->maso=$maso;
	}
	
	public function save(){
		
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		if($connect === true){
    		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
		$sql ="INSERT INTO product(ProductName,CateID,namsinh, chuyennganh,banthan,maso) VALUES ('$this->Name','$this->CateID','$this->namsinh','$this->chuyennganh','$this->banthan','$this->maso')";
		$result=mysqli_query($connect,$sql);
		return $result;

	}
	public function update($id){
		
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		if($connect === true){
    		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
		$sql ="UPDATE product SET ProductName='$this->Name',CateID='$this->CateID', namsinh='$this->namsinh', chuyennganh='$this->chuyennganh',banthan='$this->banthan',maso='$this->maso' WHERE ProductID='$id' ";
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
	
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From product WHERE ProductID='$id' ";
		$result=mysqli_query($connect,$sql);
		while($item= mysqli_fetch_assoc($result)){
			$row=$item;
		}
		return $row;
	}
	public static function del_product($id){
		
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql = "DELETE FROM product WHERE ProductID='$id' ";
		$result=mysqli_query($connect,$sql);
		
		return $result;
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
