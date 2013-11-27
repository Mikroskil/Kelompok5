<?php
	$connect = mysql_connect("localhost","root","toor");
	mysql_select_db("easyask", $connect);
	$tabel = mysql_query("SELECT * FROM user");
	$cek = false;
	if ( (isset($_POST["username"])) && (isset($_POST["password"])))
	{
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
	}	
	if ($cek)
		header("location:index.php");
	else
		header("location:login.php?salah=true");
	mysql_close($connect);
?>
