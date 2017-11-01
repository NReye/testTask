<?php
require_once("DB_Functions.php");

function checkIfStringValid($str)
{
	return preg_match("/^[aA-zZ0-9]+$/",str);
}

function echoPostData($name)
{
	if(!empty($_POST[$name]))
	{
		echo $_POST[$name];
	}
}

function makeCountryItems()
{
	$countries = DB_Functions::getCountries();

	foreach ($countries as $item) {
		echo "<option value = \"". $item['id'] ."\">".$item['country_name']."</option>";
	}
}

function checkIfEmailExits($email)
{
	return DB_Functions::CheckIfEmailExists($email);
}

function checkIfLoginExists($login)
{
	return DB_Functions::CheckIfLoginExists($login);
}

function loginViaEmail($email, $password)
{
	$res = DB_Functions::LoginByEmail($email,$password);

	if(!$res)
	{
		return false;
	}
	else
	{
		writeSession($res['email'], $res['name']);
	}
}

function loginViaLogin($login, $password)
{
	$res = DB_Functions::LoginByLogin($login,$password);
	if(!$res)
	{
		return false;
	}
	else
	{
		writeSession($res['email'], $res['name']);
	}
}

function registerNewUser($data)
{
	$res = DB_Functions::AddNewUser($data);
	if(!$res)
	{
		return false;
	}
	else
	{
		writeSession($data['email'], $data['name']);
	}
}

function writeSession($email, $name)
{
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
	header("Location: account.php");
}