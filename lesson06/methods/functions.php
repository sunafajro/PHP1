<?php


/* функция формирования кода html страницы */
function renderPage($db, $variables) {
    /* создаем пустую строку для формирования страницы */
    $html = '';
    /* подключаем файл с заголовком */
    $header = file_get_contents('./templates/layouts/header.php');
    /* подключаем файл с шаблоном рабочей области */
    $content = file_get_contents('./templates/' . $variables['unit'] . '/' . $variables['page'] . '.php');
    /* подключаем файл с правой колонкой */
    $column = file_get_contents('./templates/' . $variables['unit'] . '/column.php');
    /* подключаем файл с подвалом */
    $footer = file_get_contents('./templates/layouts/footer.php');
    $html .= $header;
    
    /* формируем данные для вывода на страницу и подставляем готовый код в шаблон */
    $params[] = '{{SITE_TITLE}}';
    $params[] = '{{UNIT}}';
    $values[] = $variables['title'];
    $values[] = $variables['unit'];

    /* в зависимости от типа страницы заправиваем из базы один или группу элементов */
    switch($variables['page']) {
        case 'index': $data = getItems($db, $variables['unit'], $variables['sort']); break;
        case 'view': 
            $data = getItem($db, $variables['unit'], $variables['id']); 
            if(!empty($data)) {
                $data['img_view_cnt'] = updateViewCount($db, $variables['id']);
            }
            break;
    }

    /* формируем данные для вывода на страницу и подставляем готовый код в шаблон */
    $params[] = '{{CONTENT}}';
    $result = '';
    $file = '';
    /* формируем контент страницы с группой элементов */
    if($variables['page'] == 'index') {
        if(!empty($data)) {
            $file = './templates/' . $variables['unit'] . '/_items.php';
            if($variables['format'] == 'grid') {
                $result .= gridItems($data, $file);
            } else {
                $result .= listItems($data, $file);
            }
        }  else {
            $result .= '<div class="alert alert-warning" role="alert">Нет элементов для отображения!</div>';
        }      
    }
    /* формируем контент страницы с одним элементом */
    if($variables['page'] == 'view') {
        if(!empty($data)) {
            $item = '';
            $arr1 = [];
            $arr2 = [];
            foreach($data as $k => $v) {
                $arr1[] = '{{' . strtoupper($k) . '}}';
                $arr2[] = $v;                      
            }
            $item = file_get_contents('./templates/' . $variables['unit'] . '/_item.php');
            $result = str_replace($arr1, $arr2, $item);
        }  else {
            $result .= '<div class="alert alert-warning" role="alert">Нет элементов для отображения!</div>';
        } 
    }

    $values[] = $result;
    
    $html .= $content;
    $html .= $column;
    $html .= $footer;
    
    $html = str_replace($params, $values, $html);
    
    return $html;
}
/* функция запроса нескольких элементов из базы */
function getItems($db, $table, $sort) {
    $q = 'SELECT * FROM ' . $table;
    if($sort != NULL && !empty($sort)) {
        $q .= ' ORDER BY ' . $sort['column'] . ' ' . $sort['direction'];
    }
    $query = $db->query($q);
    $images = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $images;
}

/* функция запроса одного элемента из базы по id */
function getItem($db, $table, $id) {
    $query = $db->query('SELECT * FROM ' . $table . ' WHERE id=' . $id);
    $image = $query->fetch(PDO::FETCH_ASSOC);
    return $image;
}

/* функция создания нового элемента в базе */
function createItem($db, $table, $args){
    $params = [];
    $names = [];
    foreach($args as $key => $value) {
        $params[] = $key;
        $names[] = ':' . $key;
    }
    $sql = 'INSERT INTO ' . $table . ' (' . implode(',', $params) . ') VALUES (' . implode(',', $names) . ')';
    $query = $db->prepare($sql);
    $query->execute($args);
    
    return true;
}

/* функция изменения элемента в базе по id */
function updateItem($db, $table, $args){
    $params = [];
    foreach($args as $key => $value) {
        if($key != 'id') {
            $params[] = $key . '=:' . $key;
        }
    }
    $sql = 'UPDATE ' . $table . ' SET ' . implode(',', $params) . ' WHERE id=:id';
    $query = $db->prepare($sql);
    $query->execute($args);
    
    return true;
}

/* функция удаления элемента из базы по id */
function deleteItem($db, $table, $args){
    $sql = 'DELETE FROM ' . $table . ' WHERE id=:id';
    $query = $db->prepare($sql);
    $query->execute($args);
    
    return true;
}

function gridItems($data, $file) {
    $result = '';
    $i = 1;
    foreach($data as $value) {
        $arr1 = [];
        $arr2 = [];
        $item = '';

        if($i % 3 == 1) {
            $item .= '<div class="row">';
        }
        foreach($value as $k => $v) {
            $arr1[] = '{{' . strtoupper($k) . '}}';
            $arr2[] = $v;
        }
        $item .= '<div class="col-sm-4 text-center">';
        $item .= file_get_contents($file);
        $item .= '</div>';
        if($i % 3 == 0) {
            $item .= '</div>';
        }   
        $result .= str_replace($arr1, $arr2, $item);
        $i++;
    }
    if(count($data) % 3) {
        $result .= '</div>';
    }
    
    return $result;
}

function listItems($data, $file) {
    $result = '';
    
    foreach($data as $value) {
        $arr1 = [];
        $arr2 = [];
        $item = '';

        foreach($value as $k => $v) {
            $arr1[] = '{{' . strtoupper($k) . '}}';
            $arr2[] = $v;
        }
        
        $item .= file_get_contents($file);
   
        $result .= str_replace($arr1, $arr2, $item);
    }

    return $result;
}

/* функция инкремента просмотров изображения */
function updateViewCount($db, $id) {
    $result = $db->prepare('UPDATE images set img_view_cnt = img_view_cnt + 1 WHERE id=:id');
    $result->bindParam(':id', $id);
    $result->execute();

    $result = $db->prepare('SELECT img_view_cnt as cnt FROM images WHERE id=:id');
    $result->execute([':id' => $id]);
    $response = $result->fetchColumn();
    return $response;
}

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

/* основная функция загрузки файла */
function uploadImage($db, $files) {   
    $result = 'empty'; 
    /* задаем параметры загруженного изображения */
    $imgtype = $files['file']['type'];
    $imgsize = $files['file']['size'];
    $imgtmpname = $files['file']['tmp_name'];
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
            //writeImagetoDb($db, $newname, $uploadorigfile, $img_thumb_path, $imgsize);
            $result = [
                'result' => 'success',
                'img_name' => $newname,
                'img_orig_path' => $uploadorigfile,
                'img_thumb_path' => $img_thumb_path,
                'img_size' => $imgsize
            ];
        } else { 
            $result = ['result' => 'error_1'];
        }
    } else {
        $result = ['result' => 'error_2'];
    }
    
    return $result;
}