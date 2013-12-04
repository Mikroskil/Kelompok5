<?php

require_once __DIR__.'/../config.php';

function postAnswer($jb, $doodle, $id_pertanyaan, $id_user)
{
	global $mysql;

	$jb = mysql_escape_string($jb);
	$doodle = mysql_escape_string($doodle);
	$id_pertanyaan = mysql_escape_string($id_pertanyaan);
	$id_user = mysql_escape_string($id_user);

	return mysql_query ("
		INSERT INTO jawaban (jb, doodle, id_pertanyaan, tanggalJb, id_user) VALUES ('$jb' , '$doodle', '$id_pertanyaan' , NOW() , $id_user)
	", $mysql);
}
?>