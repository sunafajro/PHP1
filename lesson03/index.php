<!DOCTYPE html>
	<head>
	    <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
	    <title>Урок 3</title>
	</head>
	<body>
		<h3>Домашнее задание урока №3</h3>
		<ol>
			<?php
			for($i=1;$i<10;$i++) { ?>
			<li><a href="<?= $i ?>.php">Задание <?= $i ?></a></li>
			<?php } ?>
		</ol>
	</body>
</html>