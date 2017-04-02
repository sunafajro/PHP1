<?php

//Константы ошибок
define('ERROR_NOT_FOUND', 1);
define('ERROR_TEMPLATE_EMPTY', 2);

/*
* Обрабатывает указанный шаблон, подставляя нужные переменные
*/
function renderPage($page_name, $variables = [])
{
    $file = TPL_DIR . "/" . $page_name . ".tpl";

    if (!is_file($file)) {
      	echo 'Template file "' . $file . '" not found';
      	exit(ERROR_NOT_FOUND);
    }

    if (filesize($file) === 0) {
      	echo 'Template file "' . $file . '" is empty';
      	exit(ERROR_TEMPLATE_EMPTY);
    }

    // если переменных для подстановки не указано, просто
    // возвращаем шаблон как есть
    if (empty($variables)) {
	    $templateContent = file_get_contents($file);
    }
    else {
      	$templateContent = file_get_contents($file);

        // заполняем значениями
        $templateContent = pasteValues($variables, $page_name, $templateContent);
    }

    return $templateContent;
}

function pasteValues($variables, $page_name, $templateContent)
{
    foreach ($variables as $key => $value) {
        if($value != null) {
            // собираем ключи
            $p_key = '{{' . strtoupper($key) . '}}';
            if(is_array($value)){
                // замена массивом
                $result = "";
				$i = 1;
                foreach ($value as $value_key => $item){
					$itemTemplateContent = '';
					
					if($i % 3 == 1) {
						$itemTemplateContent .= '<div class="row margin-top">';
					}
                    $itemTemplateContent .= file_get_contents(TPL_DIR . "/" . $page_name ."_".$key."_item.tpl");
                    foreach($item as $item_key => $item_value) {
						$i_key = '{{' . strtoupper($item_key) . '}}';

                        $itemTemplateContent = str_replace($i_key, $item_value, $itemTemplateContent);						
                    }

                    $result .= $itemTemplateContent;
					if($i % 3 == 0) {
						$result .= '</div>';
					}
					$i++;
                }
				if(count($value) % 3) {
					$result .= '</div>';
				}
            } else {
                $result = $value;
			}
            $templateContent = str_replace($p_key, $result, $templateContent);
        }
    }

    return $templateContent;
}

function prepareVariables($page_name, $message)
{
    $vars = [];
    switch ($page_name) {
		case 'index.php':
		    $vars['gallery'] = getPhotos();
			$vars['message'] = $message;
			break;
		/*
        case 'news':
            $vars["newsfeed"] = getNews();
            $vars["test"] = 123;
            break;
        case "newspage":
            $content = getNewsContent($_GET['id_news']);
            $vars["news_title"] = $content["news_title"];
            $vars["news_content"] = $content["news_content"];
            break;
		*/
    }

    return $vars;
}

function _log($s, $suffix='')
{
	if(is_array($s) || is_object($s)) {
		$s = print_r($s, 1);
	}
	
	$s="### ".date("d.m.Y H:i:s")."\r\n".$s."\r\n\r\n\r\n";

	if (mb_strlen($suffix)) {
		$suffix = "_".$suffix;		
		_writeToFile($_SERVER['DOCUMENT_ROOT']."/_log/logs".$suffix.".log",$s,"a+");
	}
	return $s;
}

function _writeToFile($fileName, $content, $mode="w")
{
	$dir=mb_substr($fileName,0,strrpos($fileName,"/"));
	if(!is_dir($dir)) {
		_makeDir($dir);
	}

	if($mode != "r") {
		$fh=fopen($fileName, $mode);
		if (fwrite($fh, $content)) {
			fclose($fh);
			@chmod($fileName, 0644);
			return true;
		}
	}

	return false;
}

function _makeDir($dir, $is_root = true, $root = '')
{
	$dir = rtrim($dir, "/");
	if (is_dir($dir)) return true;
	if(mb_strlen($dir) <= mb_strlen($_SERVER['DOCUMENT_ROOT'])) {
		return true;
	}
	if(str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir) == $dir) {
		return true;
	}
	if($is_root) {
		$dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir);
		$root = $_SERVER['DOCUMENT_ROOT'];
	}
	$dir_parts = explode("/", $dir);

	foreach ($dir_parts as $step => $value) {
		if($value != '') {
			$root = $root . "/" . $value;
			if (!is_dir($root)) {
				mkdir($root, 0755);
				chmod($root, 0755);
			}
		}
	}
	return $root;
}

function getPhotos()
{
	$sql = "SELECT * FROM images ORDER BY img_view_cnt DESC";
	$photos = getAssocResult($sql);
	
	if(empty($photos)) {
		$photos = '<div class="alert alert-warning" role="alert">В галерее нет ни одного фото!</div>';
	}
	
	return $photos;
}
/*		
function getNews(){
    $sql = "SELECT id_news, news_title, news_preview FROM news";
    $news = getAssocResult($sql);

    return $news;
}

function getNewsContent($id_news){
    $id_news = (int)$id_news;

    $sql = "SELECT * FROM news WHERE id_news = ".$id_news;
    $news = getAssocResult($sql);

    $result = [];
    if(isset($news[0]))
        $result = $news[0];

    return $result;
}
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

function uploadImage() {
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
				$message = '<div class="alert alert-warning" role="alert">Файл успешно загружен на сервер!</div>';
				$Query = "INSERT INTO images (img_name, img_orig_path, img_thumb_path, img_size, img_view_cnt) VALUES('$newname', '$uploadorigfile', '$img_thumb_path', $imgsize, 0)";
				executeQuery($Query);
			} else { 
				$message = '<div class="alert alert-warning" role="alert">Ошибка! Не удалось загрузить файл на сервер!</div>';
			}
		} else {
			$message = '<div class="alert alert-warning" role="alert">Ошибка! Разрешены только файлы типа jpg размером меньше 500 Кбайт!</div>';
		}
		
		return $message;
	}
}
function increaseCounter($img_id) {
	$Query = 'UPDATE images set img_view_cnt = img_view_cnt + 1 WHERE id=' . $img_id;
	executeQuery($Query);
	
	$Query = 'SELECT img_view_cnt as cnt FROM images WHERE id=' . $img_id;
	$result = getAssocResult($Query);
	return $result[0]['cnt'];
}