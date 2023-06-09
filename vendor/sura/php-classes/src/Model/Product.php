<?php 


namespace Sura\Model;

use \Sura\DB\Sql;
use \Sura\Model;
use \Slim\Slim;
use \Sura\Page;
use \Sura\Model\Product;



class Product extends Model
{
	
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_products ORDER BY idproduct");
	}

	public static function checkList($list)
	{
		foreach ($list as &$row ){
			$p = new Product();
			$p->setData($row);
			$row = $p->getValues();
		}

		return $list;
	}
	
	public static function listFree(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_products WHERE FK_idperson IS NULL");

		
	}

	public function get($idproduct)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", [
			":idproduct"=>$idproduct
		]);

		$this->setData($results[0]);

	}


	public function saveSelect()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_selectproduct_save (:idproduct,:desperson,:text)",[
			":idproduct" => $this->getidproduct(),
			":desperson"=> $this->getdesperson(),
			":text"=> $this->gettext()
		]);

		 $this->setData($results[0]);

	}

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_products_save (:idproduct, :desproduct)",[
			":idproduct" => $this->getidproduct(),
			":desproduct"=> $this->getdesproduct()
		]);

		 $this->setData($results[0]);

	}

		public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("DELETE FROM tb_products WHERE idproduct = :idproduct;",[
			":idproduct" => $this->getidproduct()
		]);


	}
	
	public function checkPhoto()
	{

		if(file_exists(
			$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.
			"res".DIRECTORY_SEPARATOR.
			"site".DIRECTORY_SEPARATOR.
			"img".DIRECTORY_SEPARATOR.
			"products".DIRECTORY_SEPARATOR.
			$this->getidproduct().".jpg"
		)){
			$url = "/res/site/img/products/".$this->getidproduct().".jpg";
		} else{

			$url =  "/res/site/img/products/product.jpg";
		}

		return $this-> setdesphoto($url);

	}

		public function getValues()
	{
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	public function setPhoto($file)
	{
		$extension = explode(".", $file["name"]);
		$extension = end($extension);

		switch ($extension) {
			case 'jpg':
			case 'jpeg':	
			$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

			case 'gif':	
			$image = imagecreatefromgif($file["tmp_name"]);
			break;

			case 'png':	
			$image = imagecreatefrompng($file["tmp_name"]);
			break;

			default:
			echo "Tipo de imgaem incorreto";
			break;

		}

		$dist = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.
			"res".DIRECTORY_SEPARATOR.
			"site".DIRECTORY_SEPARATOR.
			"img".DIRECTORY_SEPARATOR.
			"products".DIRECTORY_SEPARATOR.
			$this->getidproduct().".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();
	}


}



 ?>