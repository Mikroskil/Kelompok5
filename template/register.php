<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
	</head>
	<body>
		<?php include_once 'header.html'; ?>
		<br class="break" />
		<?php include_once 'menu.html'; ?>
		<div class="container">
			<h2>Create Account</h2>
			<div id="contain">
				<form action="" method="post">
				<table>
				<tr>
					<td>Full Name</td>
					<td> : </td>
					<td><input type="text" name="name" size="30"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td> : </td>
					<td><input type="text" name="username" size="15"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td> : </td>
					<td><input type="password" name="password" size="15"></td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td> : </td>
					<td><input type="text" name="email" size="30"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="submit" value="sign up"></td>
				</tr>
				</table>
				</form>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>