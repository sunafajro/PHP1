<?php
/* проверяем массив POST-запроса */
if(!empty($_POST)) {
    
}

/* проверяем массив GET-запроса */
if(empty($_GET)) {
    $variables['unit'] = 'images';
    $variables['page'] = 'index';    
    $variables['title'] = 'Фотогалерея';
} else {
    $parts = explode('/', $_GET['r']);
    $variables['unit'] = $parts[0];
    $variables['page'] = $parts[1];
    switch($parts[0]) {
        case 'images': $variables['title'] = 'Фотогалерея'; break;
        case 'feedbacks': $variables['title'] = 'Книга отзывов'; break;
        case 'products': $variables['title'] = 'Магазин'; break;
    }
    if(isset($_GET['id'])) {
        $variables['id'] = $_GET['id'];
    }
}