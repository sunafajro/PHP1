<?php

/* проверяем массив GET-запроса на наличие атрибута r */
if(isset($_GET['r']) && $_GET['r'] != '') {
    /* если в запросе есть переменная r, разбиваем ее на части */
    $parts = explode('/', (string)$_GET['r']);
    $variables['unit'] = $parts[0];

    /* проверяем задан ли тип страницы */
    if(isset($parts[1])) {
        $variables['page'] = $parts[1];
    } else {
        $variables['page'] = 'index';
    }

    switch($parts[0]) {
        case 'images': 
            $variables['title'] = 'Фотогалерея';
            /* задаем параметры сортировки элементов фотогалереи */
            $variables['sort'] = [
                'column' => 'img_view_cnt',
                'direction' => 'DESC'
            ];
            /* задаем формат вывода элементов */
            $variables['format'] = 'grid';
            break;
        case 'feedbacks': 
            $variables['title'] = 'Книга отзывов';
            /* задаем параметры сортировки элементов книги отзывов */
            $variables['sort'] = [
                'column' => 'date',
                'direction' => 'DESC'
            ];
            /* задаем формат вывода элементов */
            $variables['format'] = 'list';
            break;
        case 'products': 
            $variables['title'] = 'Магазин';
            $variables['sort'] = NULL;
            /* задаем формат вывода элементов */
            $variables['format'] = 'grid';
            break;
    }
    /* проверяем наличие id в запросе */
    if(isset($_GET['id']) && $_GET['id'] != '') {
        $variables['id'] = (int)$_GET['id'];
        /* если пришел запрос на удаление данных вызываем соответствующий метод */
        if($variables['page'] == 'delete') {
            $args = [
                'id' => $variables['id']
            ];
            deleteItem($db, $parts[0], $args);
            /* прерываем скрипт и уходим на главную */
            header('Location: ./index.php?r=' . $parts[0] . '/index');
        }
    } else {
        $variables['id'] = 0;
    }
} else {
    /* для остальных случаев формируем переменные для страницы с фото*/
    $variables['unit'] = 'products';
    $variables['page'] = 'index';    
    $variables['title'] = 'Магазин';
    /* задаем параметры сортировки элементов фотогалереи */
    $variables['sort'] = NULL;
    /* задаем формат вывода элементов */
    $variables['format'] = 'grid';
}