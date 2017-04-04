<?php

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
    $values[] = $variables['title'];
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

    if($variables['page'] == 'index') {
        if(!empty($data)) {
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
                $item .= file_get_contents('./templates/' . $variables['unit'] . '/_items.php');
                if($i % 3 == 0) {
                    $item .= '</div>';
                }   
                $result .= str_replace($arr1, $arr2, $item);
                $i++;
            }
            if(count($data) % 3) {
                $result .= '</div>';
            }
        }  else {
            $result .= '<div class="alert alert-warning" role="alert">Нет элементов для отображения!</div>';
        }      
    }

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

function getItems($db, $table, $sort) {
    $q = 'SELECT * FROM ' . $table;
    if($sort != NULL && !empty($sort)) {
        $q .= ' ORDER BY ' . $sort['column'] . ' ' . $sort['direction'];
    }
    $query = $db->query($q);
    $images = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return $images;
}

function getItem($db, $table, $id) {
    $query = $db->query('SELECT * FROM ' . $table . ' WHERE id=' . $id);
    $image = $query->fetch(PDO::FETCH_ASSOC);
    return $image;
}

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

function deleteItem($db, $table, $args){
    $sql = 'DELETE FROM ' . $table . ' WHERE id=:id';
    $query = $db->prepare($sql);
    $query->execute($args);
    
    return true;
}


function updateViewCount($db, $id) {
    $result = $db->prepare('UPDATE images set img_view_cnt = img_view_cnt + 1 WHERE id=:id');
    $result->bindParam(':id', $id);
    $result->execute();

    $result = $db->prepare('SELECT img_view_cnt as cnt FROM images WHERE id=:id');
    $result->execute([':id' => $id]);
    $response = $result->fetchColumn();
    return $response;
}