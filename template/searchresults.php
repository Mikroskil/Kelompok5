<?php

require_once __DIR__.'/../sql/question.php';

preg_match_all('/\[([^\]]*)\]/', $_GET['search'], $tags);
$keywords = preg_split('/ *\[[^\]]*\] */', $_GET['search']);

$questions = searchQuestion(trim(implode(' ', $keywords)), $tags[1]);

?>
<html>
	<head>
		<title>Search Result</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/global.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/link.css" />
	</head>
	<body>
		<?php include_once 'header.php'; ?>
		<br class="break" />
		<?php include_once 'menu.php'; ?>
		<div class="container">
			<h2>Search Results</h2>
			<div id="contain">
                <?php foreach ($questions as $question): ?>
                    <a href="question.php"><p><?php echo $question['isi']; ?></p></a>
                <?php endforeach; ?>
			</div>
		</div>
		<br class="break" />
		<?php include_once 'footer.html'; ?>
	</body>
</html>
