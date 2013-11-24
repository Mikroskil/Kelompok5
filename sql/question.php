<?php

require_once __DIR__.'/../config.php';

function getNewQuestion()
{
	global $mysql;

	$query = mysql_query("SELECT * FROM pertanyaan ORDER BY tanggal", $mysql);

	$result = array();
	while ($data = mysql_fetch_row($query))
	{
     		$result[] = $data;
	}	

	return $result;
}

function getUnanswerredQuestion()
{
	global $mysql;

	$query = mysql_query("SELECT * FROM pertanyaan LEFT JOIN jawaban ON pertanyaan.id = jawaban.id_pertanyaan WHERE jb is NULL", $mysql);

	$result = array();
	while ($data = mysql_fetch_row($query))
	{
     		$result[] = $data;
	}	

	return $result;
}

function postQuestion($title, $tag, $pert, $doodle, $id_user)
{
	global $mysql;

	$title = mysql_escape_string($title);
	$tag = mysql_escape_string($tag);
	$pert = mysql_escape_string($isi);
	$doodle = mysql_escape_string($doodle);
	$id_user = mysql_escape_string($id_user);
	
	return mysql_query("
		INSERT INTO pertanyaan (title, tag, pert, doodle, tanggal, id_user) VALUES ('$title' , '$tag' , '$pert' , '$doodle' , NOW() , '$id_user')
	", $mysql);
}
?>