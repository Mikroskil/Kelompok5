<?php

require_once __DIR__.'/../config.php';

function getNewQuestion()
{
	global $mysql;

	$query = mysql_query("SELECT * FROM pertanyaan ORDER BY tanggal DESC", $mysql);

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

	$query = mysql_query("SELECT pertanyaan.id,pertanyaan.title FROM pertanyaan LEFT JOIN jawaban ON pertanyaan.id = jawaban.id_pertanyaan WHERE jb is NULL");
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
		INSERT INTO pertanyaan (title, tag, pert, doodle, tanggal, id_user) VALUES ('$title' , '$tag' , '$pert' , '$doodle' , NOW() , $id_user)
	", $mysql);
}

function searchQuestion($keywords, $tags)
{
    global $mysql;

    if (empty($tags)) {
        $query = mysql_query("SELECT * FROM pertanyaan WHERE isi LIKE '%$keywords%'");
    } else {
        $tags = array_map(function($element) { return "'$element'"; }, $tags);
        $tagsFilter = implode(',', $tags);
        $tagsFilter = '('.$tagsFilter.')';

        $query = mysql_query("SELECT * FROM pertanyaan WHERE isi LIKE '%$keywords%' AND tag IN $tagsFilter");
    }
    $results = array();
    while ($row = mysql_fetch_assoc($query)) {
        $results[] = $row;
    }

    return $results;
}

function getQuestionAnswerCommentById($id) {
    global $myqsl;
    $queryPertanyaan = mysql_query("
        SELECT p.*, u.username FROM pertanyaan p INNER JOIN user u ON u.id = p.id_user 
        WHERE p.id = $id
    ");
    $pertanyaan = mysql_fetch_assoc($queryPertanyaan);
	
    $queryJawaban = mysql_query("
        SELECT j.*, u.username FROM jawaban j INNER JOIN user u ON u.id = j.id_user 
        WHERE j.id_pertanyaan = $pertanyaan[id]
    ");
    $pertanyaan['jawaban'] = array();
    while ($jawaban = mysql_fetch_assoc($queryJawaban)) {
        $queryKomentar = mysql_query("
            SELECT k.*, u.username FROM komentar k INNER JOIN user u ON u.id = k.id_user
            WHERE k.id_jawaban = $jawaban[id]
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
