<?php session_start(); ?>
<html>
    	<head>
       		 <title>Login</title>
        		<link rel="stylesheet" type="text/css" href="../assets/css/global.css">
    	</head>
    	<body>
		<?php include_once 'header.html'; ?>
		<br class="break">
		<?php include_once 'menu.html'; ?>
        		<div class="container">
            			<h3>Log In</h3>
            			<div id="contain">
			<form class="login" action="" method="post">
                				<label for="form-user">Username</label>
                				<br>
                				<input type="text" name="username" id="form-user" placeholder="username...">
                				<br><br>
                				<label for="form-pass">Password</label>
                				<br>
                				<input type="password" name="password" id="form-pass" placeholder="password...">
                				<br><br>
                				<input type="submit" value="Log in" > &nbsp; &nbsp; 
				<br><br>
				<p>Don't have an account? <a href="register.php">sign up</a></p>
            			</form>
			</div>	
        		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
    	</body>
</html>
