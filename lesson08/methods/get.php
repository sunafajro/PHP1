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

    if($variables['unit'] == 'site' && $variables['page'] == 'index') {
        $variables['unit'] = 'products';
    }

    /* удалем сессию и редиректим на главную */
    if($variables['unit'] == 'site' && $variables['page'] == 'logout') { 
        session_destroy();
        /* прерываем скрипт и уходим на главную */
        header('Location: ./index.php?r=' . $variables['unit'] . '/index');
    }
    
    /* определяем переменные для разных разделов сайта */ 
    switch($variables['unit']) {
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
        case 'users': 
            if($variables['page'] == 'profile') {
                $variables['page'] = 'view';
            }

            switch($variables['page']) {
                case 'index': $variables['title'] = 'Пользователи'; break;
                case 'view': $variables['title'] = 'Пользователь'; break;
                case 'basket': $variables['title'] = 'Корзина товаров'; break;
            }
            $variables['sort'] = NULL;
            /* задаем формат вывода элементов */
            $variables['format'] = 'list';
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
            deleteItem($db, $variables['unit'], $args);
            /* прерываем скрипт и уходим на главную */
            header('Location: ./index.php?r=' . $variables['unit'] . '/index');
        }
    } else {
        if(isset($_SESSION['user_id'])) {
            $variables['id'] = (int)$_SESSION['user_id'];
        } else {
            $variables['id'] = 0;
        }
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
