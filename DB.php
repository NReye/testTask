<?php

define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");

define("DATABASE", "codeitdb");


class Db
{

	public static function getConnection()
	{
		//$username = "benefituser";
		//$password = "benepas";
		//$database = "greenhatdb";

		$dsn = "mysql:host=".  SERVERNAME.";dbname=".DATABASE;

		try
		{
			$db = new PDO($dsn, USERNAME, PASSWORD,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
			return $db;
		}
		catch(PDOException $e)
		{
			die('<div class=\'er-pad-top\'>Connection error</div>');
		}
	}
	
}

