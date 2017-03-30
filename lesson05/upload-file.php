<?php
/* код для создания уменьшенной копии оригинального изображения 
*  http://php.net/manual/ru/function.imagecopyresampled.php
*/
function imgCopyResize($filename, $imgpath, $name) {
	$width = 200;
	$height = 200;
	
	//header('Content-Type: image/jpeg');
	
	list($width_orig, $height_orig) = getimagesize($filename);

	$ratio_orig = $width_orig/$height_orig;

	if ($width/$height > $ratio_orig) {
	   $width = $height*$ratio_orig;
	} else {
		$height = $width/$ratio_orig;
	}
	
	$image_p = imagecreatetruecolor($width, $height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
    
	$destfile = $imgpath . basename($name);
	imagejpeg($image_p, $destfile, 100);
	imagedestroy($image_p);
    
	return $destfile;
}

if(!empty($_FILES) && $_FILES['image']['name'] != '') {
	/* задаем параметры загруженного изображения */
	//$tmp_imgname = pathinfo($_FILES['image']['name']);
    //$imgname = $tmp_imgname['filename'];
	$imgtype = $_FILES['image']['type'];
	$imgsize = $_FILES['image']['size'];
	$imgtmpname = $_FILES['image']['tmp_name'];
	$newname = 'pic_' . time() . '.jpg';
	
	/* проверяем что тип изображения соответствует jpeg */
	if($imgtype == 'image/jpeg' && $imgsize < 512000) {
        
		/* задаем и проверяем наличие корневой папки 
		*  для изображений если папки нет, создаем новую
		*/
		$imgroot = './img/';	
		if (!file_exists($imgroot) || !is_dir($imgroot)) {
			@mkdir($imgroot, 0777);
		}
		/* задаем и проверяем наличие папки для оригинальных
		*  изображений если папки нет, создаем новую
		*/
		$uploaddirorig = './img/orig/';
		if (!file_exists($uploaddirorig) || !is_dir($uploaddirorig)) {
			@mkdir($uploaddirorig, 0777);
		}
		/* задаем и проверяем наличие папки для уменьшенных
		*  копий изображений если папки нет, создаем новую
		*/
		$uploaddirsmall = './img/small/';
		if (!file_exists($uploaddirsmall) || !is_dir($uploaddirsmall)) {
			@mkdir($uploaddirsmall, 0777);
		}
		
		/* создаем уменьшенную копию оригинала и копируем ее в нужную папку */
		$img_thumb_path = imgCopyResize($imgtmpname, $uploaddirsmall, $newname);
		
		/* задаем адрес куда копировать оригинальное изображение */
		$uploadorigfile = $uploaddirorig . basename($newname);
	
		/* проверяем что тип изображаения соответствует jpeg 
		*  копируем изображение из папки temp в папку назначения выводим сообщение об успешности
		*  если тип избражения несовпадает или копирование неудалось выводим ошибку
		*/
		if(move_uploaded_file($imgtmpname, $uploadorigfile)) {
			echo '<div class="alert alert-success" role="alert">Файл успешно загружен на сервер</div>';
            $Query = "INSERT INTO images (img_name, img_orig_path, img_thumb_path, img_size, img_view_cnt) VALUES('$newname', '$uploadorigfile', '$img_thumb_path', $imgsize, 0)";
            if($db) {
                $result = $db->exec($Query);
            }
		} else { 
			echo '<div class="alert alert-danger" role="alert">Ошибка! Не удалось загрузить файл на сервер!</div>';
		}
	} else {
		echo '<div class="alert alert-danger" role="alert">Ошибка! Разрешены только файлы типа jpg размером меньше 500 Кбайт!</div>';
	}
}