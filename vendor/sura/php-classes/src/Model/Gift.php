<?php 


namespace Sura\Model;

use \Sura\DB\Sql;
use \Sura\Model;
use \Slim\Slim;
use \Sura\Page;
use \Sura\Model\Product;



class Gift extends Model
{
	
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select(" 
							SELECT a.idproduct, a.desproduct, b.idperson, b.desperson, b.text
							FROM tb_products a 
							INNER JOIN tb_persons b 
							ON a.FK_idperson = b.idperson
							WHERE a.FK_idperson IS NOT NULL
							");
		
	}

	public function get($idproduct)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products a INNER JOIN tb_persons b WHERE idproduct = :idproduct", [
			":idproduct"=>$idproduct
		]);

		$this->setData($results[0]);

	}

		public function delete()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_selectproduct_delete (:idproduct, :idperson)",[
			":idproduct" => $this->getidproduct(),
			"idperson" =>  $this->getidperson()
		]);


	}

}



 ?>