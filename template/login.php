<?php
require_once __DIR__.'/../sql/user.php';
?>
<html>
    	<head>
       		 <title>Login | EasyAsk</title>
        		<link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    	</head>
    	<body>
		<?php include_once 'header.php'; ?>
		<br class="break">
		<?php include_once 'menu.php'; ?>
        		<div class="container">
            			<h3>Log In</h3>
            			<div id="contain">
				<form class="login" action="" method="post">
					<?php
					if ( (isset($_POST["username"])) && (isset($_POST["password"])) )
					{
						//if ( isset($_GET["x"]))
						//directedLogin($_POST["username"],$_POST["password"],$_SERVER['HTTP_REFERER']);
						//else
						prosesLogin($_POST["username"],$_POST["password"]);
					}	

					if ( ($_GET["salah"]) == "true")
						echo "Username atau Password salah!<br>";

					if ( $_GET["x"] == "question") 
						echo "Anda harus login terlebih dahulu agar dapat memposting jawaban dan komentar<br>";
					else
						echo "Anda harus login terlebih dahulu agar dapat menanyakan pertanyaan<br>";
					?>
					<label for="form-user">Username</label>
					<br>
					<input type="text" name="username" id="form-user" placeholder="username...">
					<br><br>
					<label for="form-pass">Password</label>
					<br>
					<input type="password" name="password" id="form-pass" placeholder="password...">
					<br><br>
					<input type="submit" name="login" value="Log in" > &nbsp; &nbsp; 
					<br><br>
					<p>Don't have an account? <a href="register.php">sign up</a></p>
				</form>
			</div>	
        		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
    	</body>
</html>
