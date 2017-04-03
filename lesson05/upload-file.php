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

function uploadImage($db, $files) {   
    $result = 'empty'; 
    /* задаем параметры загруженного изображения */
    //$tmp_imgname = pathinfo($_FILES['image']['name']);
    //$imgname = $tmp_imgname['filename'];
    $imgtype = $files['image']['type'];
    $imgsize = $files['image']['size'];
    $imgtmpname = $files['image']['tmp_name'];
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
            $result = 'success';
            writeImagetoDb($db, $newname, $uploadorigfile, $img_thumb_path, $imgsize);
        } else { 
            $result = 'error_1';
        }
    } else {
        $result = 'error_2';
    }
    
    return $result;
}