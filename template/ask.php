<?php
    require_once __DIR__.'/../sql/user.php';
	require_once __DIR__.'/../sql/question.php';
?>
<html>
	<head>
		<title>Asking</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
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
				$doodle = "";
				$id = $data["id"];
				postQuestion($title,$tags,$quest,$doodle,$id);
			}
			else if(isset($_POST["submit"]) && $_SESSION["status"] != 1)
				header("location:login.php?x=ask");
		 ?>
		<div class="container">
			<form action="" method="post">
			<label for="form-quest"><h2>Your Question</h2></label>
			<div id="contain">
				<label for="form-title">Title</label>
				<input type="text" size="100%" name="title" id="form-title">
				<br>
                <a href="#" class="btn doodle-add">Add Doodle</a>
                <a href="#" class="btn btn-danger doodle-cancel">Cancel</a>
                <div class="doodle-container">
                    <canvas id="doodle" width="800"></canvas>
                    <div>
                        <a href="#" class="btn btn-inverse btn-small pen">Pen</a>
                        <a href="#" class="btn btn-inverse btn-small eraser">Eraser</a>
                    </div>
                </div>
				<br>
				<textarea name="quest" rows="10" cols="80%" id="form-quest" placeholder="Type your question here..."></textarea>
				<br>
				<label for="form-tags">Tags</label>
				<input type="text" size="100%" name="tags" id="form-tags">
				<br>
				<input type="submit" name="submit" value="Post Your Question" class="btn btn-primary">
			</div>
			</form>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/doodle.js"></script>
	</body>
</html>
