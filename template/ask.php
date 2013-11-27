<?php
    require_once __DIR__.'/../sql/user.php';
	require_once __DIR__.'/../sql/question.php';
?>
<html>
	<head>
		<title>Asking</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<?php 
			$data = getUser($_SESSION["username"]);
			if(isset($_POST["submit"]))
			{
				$title = $_POST["title"];
				$tags = $_POST["tags"];
				$quest = $_POST["quest"];
				$doodle = "";
				$id = $data["id"];
				postQuestion($title,$tags,$quest,$doodle,$id);
				
				
			}
		 ?>
		<div class="container">
			<form action="" method="post">
			<label for="form-quest"><h2>Your Question</h2></label>
			<div id="contain">
				<label for="form-title">Title</label>
				<input type="text" size="100%" name="title" id="form-title">
				<br>
				<a href="" name="doodle"><img src="../images/doodlechat.jpg" vspace="2"></a>
				<br>
				<textarea name="quest" rows="10" cols="80%" id="form-quest" placeholder="Type your question here..."></textarea>
				<br>
				<label for="form-tags">Tags</label>
				<input type="text" size="100%" name="tags" id="form-tags">
				<br>
				<input type="submit" name="submit" value="Post Your Question">
			</div>
			</form>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>
