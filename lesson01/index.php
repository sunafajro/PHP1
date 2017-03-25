<?php 
    $title = 'minimalistica';
	$menu_links = ['home', 'archive', 'contact'];
	$main_title = 'Nunc commodo euismod massa quis vestibulum';
	$main_text = 'Nunc eget nunc libero. Nunc commodo euismod massa quis vestibulum. Proin mi nibh, dignissim a pellentesque at, ultricies sit amet sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel lorem eu libero laoreet facilisis. Aenean placerat, ligula quis placerat iaculis, mi magna luctus nibh, adipiscing pretium erat neque vitae augue. Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at ipsum.';
	$block_title = ['Ut enim risus rhoncus', 'Maecenas iaculis leo', 'Quisque consectetur odio'];
	$text = 'Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.';
	$more = 'read more';
	$year = date('Y');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<title><?= $title ?></title>
</head>
<body>
	<div id="content">
		<h1><?= $title ?></h1>
		
		<ul id="menu">
		<?php foreach($menu_links as $key => $value): ?>
			<li><a href="#"><?= $value ?></a></li>
		<?php endforeach; ?>
		</ul>
	
		<div class="post">
			<div class="details">
				<h2><a href="#"><?= $main_title ?></a></h2>
				<p class="info">posted 3 hours ago in <a href="#">general</a></p>
			
			</div>
			<div class="body">
				<p><?= $main_text ?></p>
			</div>
			<div class="x"></div>
		</div>
		<?php foreach($block_title as $key => $value): ?>
		<div class="col<?= ($key == count($block_title) - 1) ? ' last' : '' ?>">
			<h3><a href="#"><?= $value ?></a></h3>
			<p><?= $text ?></p>
			<p>&not; <a href="#"><?= $more ?></a></p>
		</div>
		<?php endforeach; ?>
		
		<div id="footer">
			<p>Copyright &copy; <em><?= $title ?> <?= $year ?></em> &middot; Design: Luka Cvrk, <a href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
		</div>	
	</div>
</body>
</html>