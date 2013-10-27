<html>
	<head>
		<title>Asking</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
	</head>
	<body>
		<?php include_once 'header.html'; ?>
		<br class="break" />
		<?php include_once 'menu.html'; ?>
		<div class="container">
			<form action="" method="post">
			<label for="form-quest"><h2>Your Question</h2></label>
			<div id="contain">
				<label for="form-title">Title</label>
				<input type="text" size="100%" name="title" id="form-title">
				<br>
				<a href=""><img src="../images/doodlechat.jpg" vspace="2"></a>
				<br>
				<textarea name="quest" rows="10" cols="80%" id="form-quest" placeholder="Type your question here..."></textarea>
				<br>
				<label for="form-tags">Tags</label>
				<input type="text" size="100%" name="tags" id="form-tags">
				<br>
				<input type="submit" value="Post Your Question">
			</div>
			</form>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>