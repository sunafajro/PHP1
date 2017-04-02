<?php

require_once('../config/config.php');

$url_array = explode("/", $_SERVER['REQUEST_URI']);
$message = '<div class="alert alert-warning hidden" role="alert"></div>';

if($_POST) {
	/* если пришли данные для загрузки файла */
	if(isset($_POST['type']) && $_POST['type'] == 'main-form') {
		$message = uploadImage();
		$url_array = [''];
	}
	/* если пришли данные обновления колич. просмотров */		
	elseif(isset($_POST['type']) && isset($_POST['id']) && $_POST['type'] == 'ajax' ) {
		$img_id = (int)$_POST['id'];
		$data = ['id' => $img_id, 'views' => increaseCounter($img_id)];
		echo json_encode($data);
		exit;
	}
}

if(end($url_array) == '') {
	$page_name = "index.php";
}
else {
	$page_name = end($url_array);
}

$variables = prepareVariables($page_name, $message);

echo renderPage($page_name, $variables);