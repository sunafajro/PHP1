<?php
/* проверяем массив POST-запроса */
if(!empty($_POST) && isset($_POST['r']) && $_POST['r'] != '') {
    /* если в запросе есть переменная type, разбиваем ее на части */
    $parts = explode('/', (string)$_POST['r']);
    switch($parts[0]) {
        case 'feedbacks':
            if($parts[1] == 'create') {
                /* проверяем наличие данных из формы */
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['title']) && isset($_POST['body'])) {
                    /* пишем данные в массив для передачи в функцию создания отзыва */
                    $args = [
                        'name' => (string)$_POST['name'], 
                        'email' => (string)$_POST['email'], 
                        'title' => (string)$_POST['title'], 
                        'body' => (string)$_POST['body'],
                        'date' => date('Y-m-d H:i:s')
                    ];
                    /* добавляем отзыв в базу */
                    createItem($db, $parts[0], $args);
                }
            } else if($parts[1] == 'update') {
                /* проверяем наличие данных из формы */
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['title']) && isset($_POST['body']) && isset($_POST['id'])) {
                    /* пишем данные в массив для передачи в функцию изменения отзыва */
                    $args = [
                        'name' => (string)$_POST['name'], 
                        'email' => (string)$_POST['email'], 
                        'title' => (string)$_POST['title'], 
                        'body' => (string)$_POST['body'],
                        'id' => (int)$_POST['id']
                    ];
                    /* добавляем отзыв в базу */
                    updateItem($db, $parts[0], $args);
                }
            } else if($parts[1] == 'getitem') {
                if(isset($_POST['id'])) {
                    $data = getItem($db, $parts[0], (int)$_POST['id']);
                    echo json_encode($data, JSON_UNESCAPED_UNICODE);
                    exit();
                }
            }
            break;
    }
    /* переходим на главную */
    header('Location: ./index.php?r=' . $parts[0] . '/index');
}

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
            break;
        case 'feedbacks': 
            $variables['title'] = 'Книга отзывов';
            /* задаем параметры сортировки элементов книги отзывов */
            $variables['sort'] = [
                'column' => 'date',
                'direction' => 'DESC'
            ]; 
            break;
        case 'products': $variables['title'] = 'Магазин'; break;
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
    $variables['unit'] = 'images';
    $variables['page'] = 'index';    
    $variables['title'] = 'Фотогалерея';
}