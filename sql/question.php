<?php

require_once __DIR__.'/../config.php';

function getNewQuestion()
{
	global $mysql;

	$query = mysql_query("SELECT pertanyaan.id , pertanyaan.title , pertanyaan.pert , pertanyaan.tanggalPert , user.username FROM pertanyaan INNER JOIN user ON pertanyaan.id_user = user.id ORDER BY tanggalPert DESC");

	$result = array();
	while ($data = mysql_fetch_assoc($query))
	{
     		$result[] = $data;
	}	

	return $result;
}

function getUnanswerredQuestion()
{
	global $mysql;

	$query = mysql_query("SELECT pertanyaan.id, title, pert, username, tanggalPert FROM pertanyaan INNER JOIN user ON pertanyaan.id_user = user.id LEFT JOIN jawaban ON pertanyaan.id = jawaban.id_pertanyaan WHERE jb is NULL");
	$result = array();
	while ($data = mysql_fetch_assoc($query))
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
	$pert = mysql_escape_string($pert);
	$doodle = mysql_escape_string($doodle);
	$id_user = mysql_escape_string($id_user);

	return mysql_query("
		INSERT INTO pertanyaan (title, tag, pert, doodle, tanggalPert, id_user) VALUES ('$title' , '$tag' , '$pert' , '$doodle' , NOW() , $id_user)
	", $mysql);
}
function searchQuestion($keywords, $tags)
{
    	global $mysql;

    	if (empty($tags)) {
        		$query = mysql_query("SELECT p.*, username FROM pertanyaan p INNER JOIN user u ON p.id_user = u.id WHERE tag LIKE '%$keywords%'");
    	} else {
        		$tags = array_map(function($element) { return "'$element'"; }, $tags);
        		$tagsFilter = implode(',', $tags);
        		$tagsFilter = '('.$tagsFilter.')';

        		$query = mysql_query("SELECT p.*, username FROM pertanyaan p INNER JOIN user u ON p.id_user = u.id WHERE tag LIKE '%$keywords%' AND tag IN $tagsFilter");
   	}
    	$results = array();
    	while ($row = mysql_fetch_assoc($query)) {
       		$results[] = $row;
    	}
	return $results;
}

function getQuestionAnswerCommentById($id) {
    	global $mysql;

    	$queryPertanyaan = mysql_query("
            SELECT p.id id_pertanyaan, p.title, p.tag, p.pert, p.doodle doodle_pertanyaan, p.tanggalPert, u.username user_pertanyaan 
            FROM pertanyaan p INNER JOIN user u ON u.id = p.id_user 
            WHERE p.id = $id
    	");

    	$pertanyaan = mysql_fetch_assoc($queryPertanyaan);
	
    	$queryJawaban = mysql_query("
            SELECT j.id id_jawaban, j.jb, j.doodle doodle_jawaban, j.tanggalJb, u.username user_jawaban 
            FROM jawaban j INNER JOIN user u ON u.id = j.id_user 
            WHERE j.id_pertanyaan = $pertanyaan[id_pertanyaan]
   	");
	
    	$pertanyaan['jawaban'] = array();

    	while ($jawaban = mysql_fetch_assoc($queryJawaban)) {
        		$queryKomentar = mysql_query("
                    SELECT k.komen, k.tanggalKom, u.username user_komentar 
                    FROM komentar k INNER JOIN user u ON u.id = k.id_user
            			WHERE k.id_jawaban = $jawaban[id_jawaban]
        		");

        		$jawaban['komentar'] = array();

        		while ($komentar = mysql_fetch_assoc($queryKomentar)) {
            			$jawaban['komentar'][] = $komentar;
        		}

        		$pertanyaan['jawaban'][] = $jawaban;
    	}
	return $pertanyaan;
}

?>
