<?php 

/* данные для подключения к базе */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'password');
define('DB', 'gallery');

$message_error = NULL;

try {
	$db = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASS);
    $db->exec("set names utf8");
} catch (Exception $e) {
    $message_error = 'Нет подключния к базе данных!';
}