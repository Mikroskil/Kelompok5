<?php

require_once __DIR__.'/../sql/question.php';
require_once __DIR__.'/../sql/answer.php';
require_once __DIR__.'/../sql/user.php';
require_once __DIR__.'/../sql/comment.php';

?>
<html>
	<head>
		<title>Questions | EasyAsk</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/quest.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/jb.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/komen.css" />
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<div class="container">
			<form method="post" class="doodle-form">
			<h3>
			<?php
				$data = getQuestionAnswerCommentById($_GET['id']);
				$iduser = getUser($_SESSION["username"]);
				echo $data['title'];
				if(isset($_POST["submit"]) && $_SESSION["status"] == 1 && (!empty($_POST["answer"])))
				{
					$jb = $_POST["answer"];
					$doodle = $_POST['doodle'];
					$id_quest = $data["id_pertanyaan"];
					$id_user = $iduser["id"];
					postAnswer($jb, $doodle, $id_quest, $id_user);
					header("location:question.php?id=" . $_GET['id'] ."");
				}
				else if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
					header("location:login.php?x=question");
				
				$n = count($data['jawaban']);
				for ($i = 0 ; $i < $n ; $i++)
				{	
					if (!empty($_POST[$data['jawaban'][$i]['id_jawaban']]) && $_SESSION["status"] == 1)
					{
						$comment = $_POST[$data['jawaban'][$i]['id_jawaban']];
						$id_jawaban = $data['jawaban'][$i]['id_jawaban'];
						$id_user = getUser($_SESSION['username']);
						postComment($comment,$id_jawaban,$id_user['id']);
						header("location:question.php?id=" . $_GET['id'] ."");
					}
				}
				
				if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
					header("location:login.php?x=question");
			?></h3>
			<div id="contain">
				<?php
					if (!empty($data['doodle_pertanyaan']))
						echo "<img src='../uploads/" . $data['doodle_pertanyaan'] . "' class='doodle'>";
				?>
				<br>
				<p>
				<?php
					echo "<div id='quest'>";
					echo $data['pert'];
					echo "</div>";
					echo "<br>";
					echo "<div id='questUser'>";
					echo "Post by : <a href='profil.php?id=" . $data['user_pertanyaan'] . "'>" . $data['user_pertanyaan'] . "</a>";
					echo "</div>";
					echo "<div id='questDate'>";
					echo "on " . $data['tanggalPert'];
					echo "</div>";
				?>
				</p>
				<br>
				<hr>
				<label for="form-comment"><h3>Answer</h3></label>
				<?php
				
				if (empty($data['jawaban']))
					echo "No Answer Available";
				else
				{
					$n = count($data['jawaban']);
					for ($i = 0 ; $i < $n ; $i++)
					{
						echo "<div id='answer'>";
						echo "<div id='Jb'>";
						echo "<img src='../uploads/" . $data['jawaban'][$i]['doodle_jawaban'] . "' class='doodle'>";
						echo "<p>" . $data['jawaban'][$i]['jb'] . "</p><br>";
						echo "</div>";
						echo "<div id='jbUser'>";
						echo  "Post by : <a href='profil.php?id=" . $data['jawaban'][$i]['user_jawaban'] . "'>" . $data['jawaban'][$i]['user_jawaban'] . "</a>";
						echo "</div>";
						echo "<div id='jbDate'>";
						echo  "on " . $data['jawaban'][$i]['tanggalJb'];
						echo "</div>";
						echo "<br><br>";
						echo "<div id='comment'>";
						echo "<fieldset>";
						
						if (!empty($data['jawaban'][$i]['komentar']))
						{
							$m = count($data['jawaban'][$i]['komentar']);
							for ($j = 0 ; $j < $m ; $j++)
							{
								echo "<div id='komentar'>";
									echo "<div id='komen'>";
									echo "<p>" . $data['jawaban'][$i]['komentar'][$j]['komen'] . "</p>";
									echo "</div>";
									echo "<div id='komenUser'>";
									echo  "Post by : <a href='profil.php?id=" . $data['jawaban'][$i]['komentar'][$j]['user_komentar'] . "'>" . $data['jawaban'][$i]['komentar'][$j]['user_komentar'] . "</a>";
									echo "</div>";
									echo "<div id='komenDate'>";
									echo  "on " . $data['jawaban'][$i]['komentar'][$j]['tanggalKom'];
									echo "<br><br>";
								echo "</div>";
							}
						}
						
						echo "<br class = 'break'>";
						echo "<input type='text' size='100%' name='" . $data['jawaban'][$i]['id_jawaban'] . "' id='form-comment' placeholder='write your comment'>";
						echo "</fieldset><br>";
						echo "</div>";
						echo "</li>";
						echo "</ul>";
						echo "</div>";
					}
				}
				?>
				<hr>
				<label for="form-answer"><h3>Your Answer</h3><label>
                				<?php include_once 'doodle.php'; ?>
				<br>
				<textarea name="answer" rows="5" cols="50%" id="form-answer" placeholder="type the answer here"></textarea>
				<br>
				<input type="submit" name="submit" value="Post Your Answer" class="btn btn-primary">
			</div>
			</form>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
        <script type="text/javascript" src="../assets/js/doodle.js"></script>
	</body>
</html>
