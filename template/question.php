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
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<div class="container">
			<form method="post">
			<h3>
			<?php
				$data = getQuestionAnswerCommentById($_GET['id']);
				$iduser = getUser($_SESSION["username"]);
				echo $data['title'];
				if(isset($_POST["submit"]) && $_SESSION["status"] == 1 && (!empty($_POST["answer"])))
				{
					$jb = $_POST["answer"];
					$doodle = "";
					$id_quest = $data["id"];
					$id_user = $iduser["id"];
					postAnswer($jb, $doodle, $id_quest, $id_user);
				}
				else if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
					header("location:login.php?x=question");
				
				$n = count($data['jawaban']);
				for ($i = 0 ; $i < $n ; $i++)
				{	
					if (!empty($_POST[$data['jawaban'][$i]['id']]) && $_SESSION["status"] == 1)
					{
						$comment = $_POST[$data['jawaban'][$i]['id']];
						$id_jawaban = $data['jawaban'][$i]['id'];
						$id_user = getUser($_SESSION['username']);
						postComment($comment,$id_jawaban,$id_user['id']);
					}
				}
				
				if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
					header("location:login.php?x=question");
			?></h3>
			<div id="contain">
				<?php
					if (!empty($data['doodle']))
						echo "<img src='../assets/uploads/" . $data['doodle'] . "' width='200'>";
				?>
				<br>
				<p>
				<?php
					echo "<div id='quest'>";
					echo $data['pert'];
					echo "</div>";
					echo "<br>";
					echo "<div id='questUser'>";
					echo "Post by : <a href='profil.php?id=" . $data['username'] . "'>" . $data['username'] . "</a>";
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
						echo "<ul>";
						echo "<li>";
						echo "<div id='Jb'>";
						echo "<p>" . $data['jawaban'][$i]['jb'] . "</p><br>";
						echo "</div>";
						echo "<div id='jbUser'>";
						echo  "Post by : <a href='profil.php?id=" . $data['jawaban'][$i]['username'] . "'>" . $data['jawaban'][$i]['username'] . "</a>";
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
									echo  "Post by : <a href='profil.php?id=" . $data['jawaban'][$i]['komentar'][$j]['username'] . "'>" . $data['jawaban'][$i]['komentar'][$j]['username'] . "</a>";
									echo "</div>";
									echo "<div id='komenDate'>";
									echo  "on " . $data['jawaban'][$i]['komentar'][$j]['tanggalKom'];
									echo "<br><br>";
								echo "</div>";
							}
						}
						
						echo "<br class = 'break'>";
						echo "<input type='text' size='100%' name='" . $data['jawaban'][$i]['id'] . "' id='form-comment' placeholder='write your comment'>";
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
				<img src="../assets/images/doodlechat.jpg" width="200">
				<br>
				<textarea name="answer" rows="5" cols="50%" id="form-answer" placeholder="type the answer here"></textarea>
				<br>
				<input type="submit" name="submit" value="Post Your Answer">
			</div>
			</form>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>