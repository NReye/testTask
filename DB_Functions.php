<?php
require_once("Db.php");

class DB_Functions
{
	//LOGINS
	public static function LoginByEmail($email, $password)
	{
		$db = Db::getConnection();
		$query = "SELECT email, name FROM users WHERE users.email = '".$email ."' AND  users.password ='". $password ."'";

		$result = $db->query($query);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		if($result->rowCount() == 0)
		{
			return false;
		}
		else
		{
			return $result->fetch();
		}
	}

	public static function LoginByLogin($login, $password)
	{
		$db = Db::getConnection();
		$query = "SELECT email, name FROM users WHERE users.login = '".$login ."' AND  users.password ='". $password ."'";

		$result = $db->query($query);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		if($result->rowCount() == 0)
		{
			return false;
		}
		else
		{
			return $result->fetch();
		}
	}


	// CHECKERS
	public  function CheckIfEmailExists($email)
	{
		$db = Db::getConnection();
		$query = "SELECT * FROM users WHERE users.email = '".$email ."'";
		$result = $db->prepare($query);
		$result->execute();

		return $result->rowCount() != 0 ;
	}

	public  function CheckIfLoginExists($login)
	{
		$db = Db::getConnection();
		$query = "SELECT * FROM users WHERE users.login = '".$login ."'";
		$result = $db->prepare($query);
		$result->execute();

		return $result->rowCount() != 0 ;
	}

	//GETTERS
	public static function getCountries()
	{
		$db = Db::getConnection();
		$query = "SELECT * FROM countries";
		$result = $db->query($query);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		return $result->fetchAll();
	}

	//ADDERS
	public static function AddNewUser($data)
	{
		$db = Db::getConnection();
		$dt = new DateTime();
		$query = "INSERT INTO users (login,email, name, password, birthday, country_ID, timestamp) VALUES ('".$data['login']."','".$data['email'] ."','".$data['name'] . "','". $data['password']."', '".$data['birthday']."', '". $data['country_ID']."','". $dt->getTimestamp()."')";

		echo $query;

		$result = $db->prepare($query);  

		if($result->execute())
		{
			return true;
		}
		return false;
	}
}


