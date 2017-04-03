<?php

function renderPage($db, $variables) {
    /* создаем пустую строку для формирования страницы */
    $html = '';
    /* подключаем файл с заголовком */
    $header = file_get_contents('./templates/layouts/header.php');
    /* подключаем файл с шаблоном рабочей области */
    $content = file_get_contents('./templates/' . $variables['unit'] . '/' . $variables['page'] . '.php');
    /* подключаем файл с правой колонкой */
    $column = file_get_contents('./templates/layouts/column.php');
    /* подключаем файл с подвалом */
    $footer = file_get_contents('./templates/layouts/footer.php');
    $html .= $header;
    
    /* формируем данные для вывода на страницу и подставляем готовый код в шаблон */
    $params[] = '{{TITLE}}';
    $values[] = $variables['title'];
    switch($variables['page']) {
        case 'index': $data = getItems($db, $variables['unit']); break;
        case 'view': $data = getItem($db, $variables['unit'], $variables['id']); break;
        case 'create': $data = createForm($db, $variables['unit']); break;
        case 'update': $data = updateForm($db, $variables['unit']); break;
    }
    /* формируем данные для вывода на страницу и подставляем готовый код в шаблон */
    
    $params[] = '{{CONTENT}}';
     
    if($variables['page'] == 'view') {
        $arr1 = [];
        $arr2 = [];
        foreach($data as $k => $v) {
            $arr1[] = '{{' . strtoupper($k) . '}}';
            $arr2[] = $v;
            $item = file_get_contents('./templates/' . $variables['unit'] . '/_item.php');           
        }
        $result = str_replace($arr1, $arr2, $item);
    }
    
    $values[] = $result;
    
    $html .= $content;
    $html .= $column;
    $html .= $footer;
    
    $html = str_replace($params, $values, $html);
    
    return $html;
}

function getItems($db, $table){
    $query = $db->query('SELECT * FROM ' . $table);
    $images = $query->fetchAll();
    
    return $images;
}

function getItem($db, $table, $id){
    $query = $db->query('SELECT * FROM ' . $table . ' WHERE id=' . $id);
    $image = $query->fetch(PDO::FETCH_ASSOC);
    
    return $image;
}

function createForm($db, $table){
    //$query = $db->query('SELECT * FROM ' . $table . 'WHERE id=' . $id);
    //$images = $query->fetchAll();
    
    return true;
}

function updateForm($db, $table, $id){
    //$query = $db->query('SELECT * FROM ' . $table . 'WHERE id=' . $id);
    //$images = $query->fetchAll();
    
    return true;
}