<?php
$host = 'localhost';
$dbname = 'gallery';
$user = 'root';
$password = '';

$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
if($db) {
    $db->exec("set names utf8");
}

?>