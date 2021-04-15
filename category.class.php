<?php 	
require_once("connect.php");
class Category
{
	public $cateID;
	public $categoryName;
	public $description;
	public function __construct($cate_name,$desc){
		$this->categoryName=$cate_name	;
		$this->description=$desc;
		
	}
		public static function cate_product(){
		$row=array();
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From category";
		$result=mysqli_query($connect,$sql);
		while($item= mysqli_fetch_assoc($result)){
			$row[]=$item;
		}
		return $row;
	}
	public static function find_cate($cateid){
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From category WHere CateID='$cateid' ";
		$result=mysqli_query($connect,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
   			$ngu= $row['CategoeyName'];
   			}
   			
   			return $ngu;
	}


	

}

 ?>
