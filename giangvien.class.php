<?php 	

class GiangVien
{
	public $ID;
	public $Name;
	public $MaSo;
	public $NamSinh;
	public $IDNoiSinh;
	public $HocVi;
	public $LinhVuc;
	public function __construct($name,$ms,$namsinh,$noisinh,$hocvi,$linhvuc){

		
		
	}
		public static function get_gv(){
		$row=array();
		$connect=mysqli_connect("localhost", "root", "", "ecommerce");
		$sql="SELECT * From giangvien";
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
