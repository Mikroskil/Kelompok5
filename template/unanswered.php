<?php
    require_once __DIR__.'/../sql/question.php';
?>

<html>
	<head>
		<title>Unanswered | EasyAsk</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/quest.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/link.css" />
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<div class="container">
			<h2>Unanswered Questions</h2>
			<div id="contain">
				<?php
				$hasil = getUnanswerredQuestion();
				$n = count($hasil);
				for ($i = 0 ; $i < $n ; $i++)
				{
					echo "<div id='questTitle'>";
					echo "<a href='question.php?id=" . $hasil[$i]['id'] . "'>" . $hasil[$i]['title'] . "</a>";
					echo "</div>";
					echo "<div id='quest'>";
					echo "<p> " . $hasil[$i]['pert'] . "</p>";
					echo "</div>";
					echo "<div id='questUser'>";
					echo "by : <a href='profil.php?id=" . $hasil[$i]['username'] . "'>"  . $hasil[$i]['username'] . "</a>";
					echo "</div>";
					echo "<div id='questDate'>";
					echo "- &nbsp;" . $hasil[$i]['tanggalPert'];
					echo "</div>";
					echo "<br><br>";
				}
			?>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>