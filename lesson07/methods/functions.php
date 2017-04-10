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
    
    if(isset($_SESSION['auth']) && isset($_SESSION['fullname']) && $_SESSION['auth'] == 1) {
        $user_block = file_get_contents('./templates/layouts/dropdown.php');
        $username = $_SESSION['fullname'];
    } else {
        $user_block = file_get_contents('./templates/layouts/login.php');
        $username = '';
    }

    $ids = NULL;
    $articuls = [];
    $tmp = [];
    $i = 0;
    if(isset($_COOKIE['toBuy']) && !empty($_COOKIE['toBuy'])) {
        foreach($_COOKIE['toBuy'] as $key => $value) {
            $tmp[] = ':articul' . $i;
            $articuls[':articul' . $i] = $key;
            $i++;
        }
        $ids = implode($tmp, ',');
    }
    
    /* заливаем в переменную заголовочный файл */
    $html .= $header;
    
    /* формируем данные для вывода на страницу и подставляем готовый код в шаблон */
    /* ключи */
    $params[] = '{{SITE_TITLE}}';
    $params[] = '{{UNIT}}';
    $params[] = '{{USER_BLOCK}}';
    $params[] = '{{USER_NAME}}';
    $params[] = '{{MENU}}';
    /* значения */
    $values[] = $variables['title'];
    $values[] = $variables['unit'];
    $values[] = $user_block;
    $values[] = $username;
    
    $menu_items = getMenuItems($db);
    
    if(!empty($menu_items)) {
        $menu_list = '';
        foreach($menu_items as $m) {
            if(isset($_SESSION['role']) && $_SESSION['role'] != 'administrator' && $m['folder'] != 'users') {
                $menu_list .= '<li><a href="./index.php?r=' . $m['folder'] . '/index">' . $m['title'] . '</a></li>';
            }
            if(isset($_SESSION['role']) && $_SESSION['role'] == 'administrator') {
                $menu_list .= '<li><a href="./index.php?r=' . $m['folder'] . '/index">' . $m['title'] . '</a></li>';
            }
        }
        $values[] = $menu_list;
    } else {
        $values[] = '';
    }
    
    switch($variables['page']) {
        case 'index': $data = getItems($db, $variables['unit'], $variables['sort']); break;
        case 'basket': $data = getItemsByArticul($db, $ids, $articuls); break;
        case 'view': 
            $data = getItem($db, $variables['unit'], $variables['id']); 
            if(!empty($data) && $variables['unit'] == 'images') {
                $data['img_view_cnt'] = updateViewCount($db, $variables['id']);
            }
            break;
    }
    /* формируем данные для вывода на страницу и подставляем готовый код в шаблон */
    
    $result = '';
    $file = '';
    /* для странички с несколькими элементами */
    if($variables['page'] == 'index' || $variables['page'] == 'basket') {
        if(!empty($data)) {
            if($variables['page'] == 'index') {
                $file = './templates/' . $variables['unit'] . '/_items.php';
            } else {
                $file = './templates/' . $variables['unit'] . '/_basket_items.php';
            }
            /* если надо вывести в виде таблицы */
            if($variables['format'] == 'grid') {
                $result .= gridItems($data, $file, $variables['unit']);
            }
            /* в противном случае в виде списка */            
            else {
                $result .= listItems($data, $file, $variables['unit'], $variables['page']);
            }
        }  else {
            $result .= '<div class="alert alert-warning" role="alert">Нет элементов для отображения!</div>';
        }      
    }

    /* для странички с одним элементом */
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
    $params[] = '{{CONTENT}}';
    $values[] = $result;

    $params[] = '{{CART}}';
    if((int)$_COOKIE['cntItems'] == 0) {
        $values[] = '<div id="cart-block" class="well hidden">Товаров в корзине: <a id="cart_items_count" href="./index.php?r=users/basket">0</a></div>';
    } else {
        $values[] = '<div id="cart-block" class="well">Товаров в корзине: <a id="cart_items_count" href="./index.php?r=users/basket">' . (int)$_COOKIE['cntItems'] . '</a></div>';
    }

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
    $query = $db->prepare($q);
    $command = $query->execute();
    $images = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $images;
}

/* функция запроса одного элемента из базы по id */
function getItem($db, $table, $id) {
    $query = $db->prepare('SELECT * FROM ' . $table . ' WHERE id=:id');
    $command = $query->execute([':id'=>$id]);
    $image = $query->fetch(PDO::FETCH_ASSOC);

    return $image;
}

/* функция запроса нескольких товаров из базы по артикулу */
function getItemsByArticul($db, $ids, $articuls) {
    $q = 'SELECT * FROM products WHERE articul in (' .$ids . ')';  
    $query = $db->prepare($q);
    $command = $query->execute($articuls);
    $images = $query->fetchAll(PDO::FETCH_ASSOC);

    return $images;
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
        $params[] = $key . '=:' . $key;
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

function gridItems($data, $file, $unit) {
    $result = '';
    $i = 1;

    switch($unit) {
        case 'products': $nomination = 'товар'; break;
        case 'feedbacks': $nomination = 'отзыв'; break;
        case 'images': $nomination = 'фото'; break;
        case 'users': $nomination = 'пользователя'; break;
        default: '';
    }

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

        $arr1[] = '{{EDIT}}';
        $arr1[] = '{{DELETE}}';
        if(isset($_SESSION['auth']) && isset($_SESSION['role']) && $_SESSION['auth'] == 1 && $_SESSION['role'] == 'administrator') {
            $arr2[] = '<a id="' . $value['id'] . '" class="edit-links btn btn-info btn-xs" title="Изменить ' . $nomination . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
            $arr2[] = '<a href="./index.php?r=' . $unit . '/delete&id=' . $value['id'] . '" class="btn btn-danger btn-xs" title="Удалить ' . $nomination . '" onclick="return confirm(\'Вы уверены?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
        } else {
            $arr2[] = '';
            $arr2[] = '';
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

function listItems($data, $file, $unit, $page) {
    $result = '';

    switch($unit) {
        case 'products': $nomination = 'товар'; break;
        case 'feedbacks': $nomination = 'отзыв'; break;
        case 'images': $nomination = 'фото'; break;
        case 'users': $nomination = 'пользователя'; break;
        default: '';
    }
    foreach($data as $value) {
        $arr1 = [];
        $arr2 = [];
        $item = '';

        foreach($value as $k => $v) {
            $arr1[] = '{{' . strtoupper($k) . '}}';            
            $arr2[] = $v;
        }

        $arr1[] = '{{EDIT}}';
        $arr1[] = '{{DELETE}}';
        if(isset($_SESSION['auth']) && isset($_SESSION['role']) && $_SESSION['auth'] == 1 && $_SESSION['role'] == 'administrator') {
            $arr2[] = '<a id="' . $value['id'] . '" class="edit-links btn btn-info btn-xs" title="Изменить ' . $nomination . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
            $arr2[] = '<a href="./index.php?r=' . $unit . '/delete&id=' . $value['id'] . '" class="btn btn-danger btn-xs" title="Удалить ' . $nomination . '" onclick="return confirm(\'Вы уверены?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
        }
        else if($unit == 'users' && $page == 'basket') {
            $arr2[] = '';
            $arr2[] = '<button id="prod-' . $value['id'] . '" class="btn btn-danger btn-xs btn-del-buy" title="Удалить" onclick="return confirm(\'Вы уверены?\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
        }
        else {
            $arr2[] = '';
            $arr2[] = '';
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

/* функция аутентификации пользователя */
function authUser($db, $username, $password) {
    $result = $db->prepare('SELECT id, fullname, role FROM users WHERE username=:username AND password=:password');
    $result->execute([':username' => $username, ':password' => md5($password)]);
    $response = $result->fetch(PDO::FETCH_ASSOC);
    
    return $response;
}

/* функция аутентификации пользователя */
function getMenuItems($db) {
    $result = $db->prepare('SELECT folder, title FROM menu');
    $result->execute();
    $response = $result->fetchAll(PDO::FETCH_ASSOC);
    
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