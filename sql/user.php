<?php

require_once __DIR__.'/../config.php';

function checkUser($username) {
    global $mysql;

    $username = mysql_escape_string($username);
    $query = mysql_query("SELECT * FROM user WHERE user = '$username'");

    return mysql_num_rows($query) > 0 ? true : false;
}

function registerUser($username, $password, $nama, $email) {
    global $mysql;

    $username = mysql_escape_string($username);
    $password = mysql_escape_string($password);
    $nama = mysql_escape_string($nama);
    $email = mysql_escape_string($email);

    return mysql_query("
        INSERT INTO user (username, password,nama,email) VALUES ('$username' , '$password' , '$nama' , '$email')
    ", $mysql);
}

function editUser($username,$password, $nama) {
	global $mysql;
	
	$password = mysql_escape_string($password);
	$nama = mysql_escape_string($nama);
	
	return mysql_query("
	UPDATE user SET password = '$password', nama = '$nama'
	WHERE username = '$username'
	", $mysql);
}

function getUser($username){
	global $mysql;
	
	$username = mysql_escape_string($username);
	$tabel = mysql_query("SELECT * FROM user WHERE username = '$username'");
	$result = mysql_fetch_assoc($tabel);
	return $result;
}

function prosesLogin($username,$password){
	global $mysql;
	
	$username = mysql_escape_string($username);
	$password = mysql_escape_string($password);
	$tabel = mysql_query("SELECT * FROM user");
	$cek = false;
	
	while ( ($data = mysql_fetch_array($tabel)) && (!$cek) )
		{
			if ($_POST["username"] == $data["username"] && $_POST["password"] == $data["password"] )
			{
			session_start();
			$_SESSION["status"] = 1 ;
			$_SESSION["name"] = $data["nama"];
			$_SESSION["username"] = $data["username"];
			$cek = true;
			}
		}
		
	if ($cek)
		header("location:index.php");
	else 
		header("location:login.php?salah=true");
		
}

function directedLogin($username,$password,$x){
	global $mysql;
	
	$username = mysql_escape_string($username);
	$password = mysql_escape_string($password);
	$tabel = mysql_query("SELECT * FROM user");
	$cek = false;
	
	while ( ($data = mysql_fetch_array($tabel)) && (!$cek) )
		{
			if ($_POST["username"] == $data["username"] && $_POST["password"] == $data["password"] )
			{
			session_start();
			$_SESSION["status"] = 1 ;
			$_SESSION["name"] = $data["nama"];
			$_SESSION["username"] = $data["username"];
			$cek = true;
			}
		}
		
	if ($cek)
		header("location:$x");
	else 
		header("location:login.php?salah=true");
		
}

?>
