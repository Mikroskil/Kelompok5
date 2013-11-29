<?php

require_once __DIR__.'/../sql/question.php';
require_once __DIR__.'/../sql/answer.php';
require_once __DIR__.'/../sql/user.php';
require_once __DIR__.'/../sql/comment.php';

?>
<html>
	<head>
		<title>Questions</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<div class="container">
			<form action="" method="post">
			<h3>
			<?php
				$data = getQuestionAnswerCommentById($_GET['id']);
				$iduser = getUser($_SESSION["username"]);
				echo $data['title'];
				
				if(isset($_POST["submit"]) && $_SESSION["status"] == 1)
				{
					$jb = $_POST["answer"];
					$doodle = "";
					$id_quest = $data["id"];
					$id_user = $iduser["id"];
					postAnswer($jb, $doodle, $id_quest, $id_user);
				}
				else if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
					header("location:login.php?x=question");
					
				if(isset($_POST["comment"]) && $_SESSION["status"] == 1)
				{
					$id_quest = $data["id"];
					$comment = $_POST["comment"];
					$id_jawaban = getAnswerById($id_quest);
					$id_user = $_SESSION["username"];
					var_dump($id_jawaban);
					var_dump($id_quest);
					postComment($comment,$id_jawaban,$id_user);
				}
				else if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
					header("location:login.php?x=question");
			?></h3>
			<div id="contain">
			<img src="../images/questions-and-answers.jpg" width="100"> <br>
				<p>
				<?php
				echo $data['pert'];
				?>
				</p>
				<hr>
				<label for="form-comment"><h3>Answer</h3></label>
				<img src="../images/doodlechat.jpg" width="200">
				<p>Isi Jawaban</p>
				<br>
				<fieldset>
					<p>Comment One</p>
					<p>Comment Two</p>
					<input type="text" size="100%" name="comment" id="form-comment" placeholder="write your comment">
				</fieldset>
				<br>
				<hr>
				<label for="form-answer"><h3>Your Answer</h3><label>
				<img src="../images/doodlechat.jpg" width="200">
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