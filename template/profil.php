<?php
    require_once __DIR__.'/../sql/user.php';
?>
<html>
	<head>
		<title>Profil</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		
		<?php include_once 'menu.php'; ?>
		
		<div class="container">
		
		<?php
			$connect = mysql_connect("localhost","root","");
			mysql_select_db("easyask", $connect);
			$tabel = mysql_query("SELECT * FROM user");
			$data = mysql_fetch_array($tabel);
		?>
		
			<h2>Profil</h2>
			<div id="contain">
				<form action="editprofil.php" method="post">
				<table>
				<tr>
					<td>Username</td>
					<td> : </td>
					<td><?php echo $data["username"] ?></td>
				</tr>
				<tr>
					<td>Full Name</td>
					<td> : </td>
					<td><?php echo $data["nama"] ?></td>
				</tr>

				<tr>
					<td>E-mail</td>
					<td> : </td>
					<td><?php echo $data["email"] ?></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="edit" value="Edit Name & Password" /></td>
				</tr>
				</table>
				</form>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>
