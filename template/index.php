<?php
    require_once __DIR__.'/../sql/question.php';
?>
<html>
	<head>
		<title>Q&A</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/link.css" />
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<div class="container">
			<h2>Recent Questions</h2>
			<div id="contain">
			<?php
				$hasil = getNewQuestion();
				$n = count($hasil);
				for ($i = 0 ; $i < $n ; $i++)
				{
					echo "<a href='question.php?id=" . $hasil[$i]['id'] . "'>";
					echo $hasil[$i]['title'];
					echo "</a>";
					echo "<br>";
				}
			?>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>