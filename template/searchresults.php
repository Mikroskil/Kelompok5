<?php

require_once __DIR__.'/../sql/question.php';

preg_match_all('/\[([^\]]*)\]/', $_GET['search'], $tags);
$keywords = preg_split('/ *\[[^\]]*\] */', $_GET['search']);

$questions = searchQuestion(trim(implode(' ', $keywords)), $tags[1]);

?>
<html>
	<head>
		<title>Search Result | EasyAsk</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/link.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/quest.css" />
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<div class="container">
			<h2>Search Results</h2>
			<div id="contain">
                				<?php foreach ($questions as $question): ?>
				<div id="questTitle">
                    					<?php echo "<a href='question.php?id=" . $question['id'] . "'>" . $question['title'] . "</a>"; ?>
				</div>
				<div id="quest">
					<p><?php echo $question['pert']; ?></p>
				</div>
				<div id="questUser">
					by : <?php echo "<a href='profil.php?id=" . $question['username'] . "'>" . $question['username'] . "</a>"; ?>
				</div>
				<div id="questDate">
					- &nbsp;<?php echo $question['tanggalPert']; ?>
				</div>
				<br><br>
                				<?php endforeach; ?>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>
