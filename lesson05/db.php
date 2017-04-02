<?php
$host = 'localhost';
$dbname = 'gallery';
$user = 'root';
$password = '';

try {
	$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (Exception $e) {
    $message = 'Нет подключния к базе данных!';
}
if($db) {
    $db->exec("set names utf8");
}

?>