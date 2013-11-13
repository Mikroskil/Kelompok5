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
		
			<h2>Create Account</h2>
			<div id="contain">
			<?php
			$error = "&nbsp";
			if (isset($_POST["submit"]))
			{
				if (!preg_match("/^[a-zA-Z]{1}[a-zA-Z0-9\.\-\_]+$/",$_POST["username"]))
					$error = "Id kosong atau salah!";
				else if (!preg_match("/^[a-zA-Z]/",$_POST["name"]))
					$error = "Nama kosong atau salah!";
				else if (!preg_match("/^[a-zA-Z0-9]+([a-zA-Z0-9_.]+)[@]{1}[a-zA-Z]+(([.]{1}[a-zA-Z]{2,4}){1,})/",$_POST["email"]))
					$error = "Email kosong atau salah!";
				else if (!preg_match("/^[a-zA-Z0-9]{4,12}+$/",$_POST["password"]))
					$error = "Password salah atau kurang dari 4 karakter!";
				else
				{
					$error = "&nbsp";
					$data = Array();
					$cek = true;
					
					$connect = mysql_connect("localhost","root","");
					mysql_select_db("easyask",$connect);
					$tabel = mysql_query("SELECT * FROM user");
					
					$username = $_POST["username"];
					while ($row = mysql_fetch_array($tabel))
					{
						if ($row['username'] == $_POST["username"])
						{
							$error = "Id telah terpakai!";
							$cek = false;
						}
					}
					
					if ($cek)
					{
						$nama = $_POST["name"];
						$email = $_POST["email"];
						$pass = $_POST["password"];
					
						$insert = mysql_query("INSERT INTO user (username, password,nama,email)
						VALUES ('$username' , '$pass' , '$nama' , '$email') " , $connect);
						
						$_SESSION["status"] = 1;
						$_SESSION["name"] = $nama;
						$_SESSION["username"] = $username;
						
						header("location:index.php");
					}
					mysql_close($connect);
				}
				echo $error;
			}
		?>
				<form action="" method="post">
				<table>
				<tr>
					<td>Username</td>
					<td> : </td>
					<td><input type="text" name="username" size="15"></td>
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