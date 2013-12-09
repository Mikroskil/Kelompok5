<?php
    require_once __DIR__.'/../sql/user.php';
	require_once __DIR__.'/../sql/question.php';
?>
<html>
	<head>
		<title>Asking | EasyAsk</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
        		<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<?php 
			$data = getUser($_SESSION["username"]);
			if(isset($_POST["submit"]) && $_SESSION["status"] == 1)
			{
				$title = $_POST["title"]; 
				$tags = $_POST["tags"];
				$quest = $_POST["quest"];
				$doodle = $_POST["doodle"];
				$id = $data["id"];
				postQuestion($title,$tags,$quest,$doodle,$id);
			}
			else if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
				header("location:login.php?x=ask");
		 ?>
		<div class="container">
			<form method="post" class="doodle-form">
			<label for="form-quest"><h2>Your Question</h2></label>
			<div id="contain">
				<label for="form-title">Title</label>
				<br>
				<input type="text" name="title" id="form-title">
				<br><br>
                				<?php include_once 'doodle.php'; ?>
				<br>
				<textarea name="quest" rows="10" cols="80%" id="form-quest" placeholder="Type your question here..."></textarea>
				<br>
				<label for="form-tags">Tags</label>
				<br>
				<input type="text" name="tags" id="form-tags">
				<br><br>
				<input type="submit" name="submit" value="Post Your Question" class="btn btn-primary">
			</div>
			</form>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
        		<script type="text/javascript" src="../assets/js/doodle.js"></script>
	</body>
</html>
