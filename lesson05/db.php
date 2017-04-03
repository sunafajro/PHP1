<?php
$host = 'localhost';
$dbname = 'gallery';
$user = 'root';
$password = '';

try {
	$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (Exception $e) {
    $message_error = 'Нет подключния к базе данных!';
}
if($db) {
    $db->exec("set names utf8");
}

function getImagesCount($db) {
    $query = $db->query("SELECT COUNT(*) as cnt FROM images");
    $img_cnt = $query->fetch();
    
    return $img_cnt;
}

function getImages($db) {
    $query = $db->query("SELECT * FROM images ORDER BY img_view_cnt DESC");
    $images = $query->fetchAll();
    
    return $images;
}

function writeImagetoDb($db, $newname, $uploadorigfile, $img_thumb_path, $imgsize) {
    $Query = "INSERT INTO images (img_name, img_orig_path, img_thumb_path, img_size, img_view_cnt) VALUES('$newname', '$uploadorigfile', '$img_thumb_path', $imgsize, 0)";
    $result = $db->exec($Query);
    
    return true;
}
?>