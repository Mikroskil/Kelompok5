<?php
    require_once __DIR__.'/../sql/user.php';
?>
<html>
	<head>
		<title>Profil | EasyAsk</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<?php
			if (!empty($_GET["id"]))
			{
				$data = getUser($_GET["id"]);
			}
			else
			{
				$data = getUser($_SESSION["username"]);
			}
		?>
		<div class="container">
			<h2>Profil</h2>
			<div id="contain">
				<form action="editprofil.php" method="post">
				<table>
				<tr>
					<td rowspan="4"><img src = "../assets/images/angel-and-devil-doodle.png" width="150"></td>
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
					<?php
						if ($_GET["id"] == $_SESSION["username"] || empty($_GET["id"]) )
							echo "<td colspan='3'><input type='submit' name='edit' value='Edit Name & Password' class='btn btn-small btn-primary'/></td>";
					?>
				</tr>
				</table>
				</form>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>
