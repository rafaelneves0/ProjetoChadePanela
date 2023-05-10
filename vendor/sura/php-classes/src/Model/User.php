<?php 

namespace Sura\Model;

use \Sura\DB\Sql;
//use \Sura\Mailer;
use \Sura\Model;

class User extends Model{

	const SESSION = "User";
	const SECRET = "SusyeRafa_Secret";
	const SECRET_IV = "SueFael_Secret_IV";

	public static function getFromSession () 
	{
		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0 ) {

			$user->setData($_SESSION[User::SESSION]);
		
		}
		return $user;
	}

	public static function checkLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
		) {
			//Não está logado
			return false;

		} else {

			if ($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true) {

				return true;

			} else if ($inadmin === false) {

				return true;

			} else {

				return false;

			}

		}

	}

	public static function login($login, $password)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		)); 

		if (count($results) === 0)
		{
			throw new \Exception("Usuario ou Senha incorreto");
		}

		$data = $results[0];

		if (password_verify($password, $data["despassword"]) === true)
		{

			$user = new User();

			//$data['deslogin'] = utf8_encode($data['deslogin']);

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {
			throw new \Exception("Usuario ou Senha incorreto");
		}

	}

	public static function verifyLogin($inadmin = true)
	{

		if (!User::checkLogin($inadmin)) {

			if ($inadmin) {
				header("Location: /admin/login");
			} else {
				header("Location: /login");
			}
			exit;

		}

	}



	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("INSERT INTO tb_users (deslogin, despassword, inadmin) VALUES (:deslogin, :despassword, :inadmin)", [
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>$this->getdespassword(),
			":inadmin"=>$this->getinadmin()
		]);

		//$this->setData($results[0]);

	}

	public function get($iduser)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE iduser = :iduser", array(
			":iduser"=>$iduser
		));

		$data = $results[0];

		$data['deslogin'] = utf8_encode($data['deslogin']);


		$this->setData($data);

	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("UPDATE tb_users SET deslogin = :deslogin, inadmin = :inadmin WHERE iduser= :iduser", [
			":iduser"=>$this->getiduser(),
			":deslogin"=>$this->getdeslogin(),
			":inadmin"=>$this->getinadmin()
		]);

		//$this->setData($results[0]);		

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_users WHERE iduser=:iduser", [
			":iduser"=>$this->getiduser()
		]);

	}

	
	public static function checkLoginExist($login)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :deslogin", [
			':deslogin'=>$login
		]);

		return (count($results) > 0);

	}

	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}

}

 ?>