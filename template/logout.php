<?php
	session_start();
	unset ($_SESSION["status"]);
	unset ($_SESSION["username"]);
	unset ($_SESSION["name"]);
	
	session_destroy();
	header("location:index.php");
?>