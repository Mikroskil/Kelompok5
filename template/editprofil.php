<?php
    require_once __DIR__.'/../sql/user.php';
?>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		
		<?php include_once 'menu.php'; ?>
		
		<div class="container">
		
			<h2>Edit Profil</h2>
			<div id="contain">
			<?php		
			$error = "&nbsp";
			if (isset($_POST["submit"]))
			{
				if (!preg_match("/^[a-zA-Z]/",$_POST["name"]))
					$error = "Nama kosong atau salah!";
				else if (!preg_match("/^[a-zA-Z0-9]{4,12}+$/",$_POST["password"]))
					$error = "Password salah atau kurang dari 4 karakter!";
				else
				{
						$username = $_SESSION["username"];
						$nama = $_POST["name"];
						$pass = $_POST["password"];
					
                        editUser($username, $pass, $nama);
						
						$_SESSION["status"] = 1;
						$_SESSION["name"] = $nama;
						$_SESSION["username"] = $username;
						
						header("location:profil.php");
				}
				echo $error;
			}
		?>
				<form action="" method="post">
				<table>
				<tr>
					<td>Username</td>
					<td> : </td>
					<td><?php echo $_SESSION["username"] ?></td>
				</tr>
				<tr>
					<td>Full Name</td>
					<td> : </td>
					<td><input type="text" name="name" size="30"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td> : </td>
					<td><input type="password" name="password" size="15"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Edit"></td>
					<td><input type="reset" name="reset" value="Reset" /></td>
				</tr>
				</table>
				</form>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>
