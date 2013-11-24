<?php

require_once __DIR__.'/../config.php';

function postComment($komen, $id_jawaban, $id_user)
{
	global $mysql;
	
	$komen = mysql_escape_string($isi);
	$id_jawaban = mysql_escape_string($id_jawaban);
	$id_user = mysql_escape_string($id_user);
	
	return mysql_query("
		INSERT INTO komentar (komen, id_jawaban, tanggal, id_user) VALUES ('$komen' , '$id_jawaban' , NOW()  , '$id_user')
	", $mysql);
}
?>