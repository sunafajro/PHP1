<?php
/* проверяем массив POST-запроса */
if(!empty($_POST) && isset($_POST['r']) && $_POST['r'] != '') {
    /* если в запросе есть переменная type, разбиваем ее на части */
    $parts = explode('/', (string)$_POST['r']);
    switch($parts[1]) {
        /* метод создания элемента */
        case 'create':
            $args = [];
            /* пишем данные в массив для передачи в функцию создания отзыва */
            foreach($_POST as $key => $value) {
                if($key != 'r' && $key != 'id') {
                    $args[$key] = $value;
                }
            }
            /* задаем исходное значение колич просмотров для галереи */
            if($parts[0] == 'images') {
                $args['img_view_cnt'] = 0;
            }
            /* задаем текущую дату в качестве даты добавления элемента */
            $args['date'] = date('Y-m-d H:i:s');
            /* если передан файл запускаем функцию обработки изображения */            
            if(isset($_FILES['file']) && $_FILES['file']['name'] !== '') {
                /* обрабатываем файл */
                $file = uploadImage($db, $_FILES);
                /* заполняем данные для записи элемента в базу */
                if($file && !empty($file)) {
                    $args['img_name'] = $file['img_name'];
                    $args['img_orig_path'] = $file['img_orig_path'];
                    $args['img_thumb_path'] = $file['img_thumb_path'];
                    $args['img_size'] = $file['img_size'];
                }
            }
            /* если прилетает запрос с пустой картинкой подставляем дефолтную */
            else if(isset($_FILES['file']) && $_FILES['file']['name'] === '') {
                $args['img_name'] = 'noimage.jpg';
                $args['img_orig_path'] = './img/orig/noimage.jpg';
                $args['img_thumb_path'] = './img/small/noimage.jpg';
                $args['img_size'] = '49185';
            }
            /* добавляем элемент в базу */
            createItem($db, $parts[0], $args);
            break;
        /* метод изменения элемента */
        case 'update': 
            /* пишем данные в массив для передачи в функцию изменения отзыва */
            foreach($_POST as $key => $value) {
                if($key != 'r') {
                    $args[$key] = $value;
                }
            }
            /* если передан файл запускаем функцию обработки изображения */
            if(!empty($_FILES) && isset($_FILES['file']) && $_FILES['file']['name'] !== '') {
                /* обрабатываем файл */
                $file = uploadImage($db, $_FILES);
                /* заполняем данные для записи элемента в базу */
                if($file && !empty($file)) {
                    $args['img_name'] = $file['img_name'];
                    $args['img_orig_path'] = $file['img_orig_path'];
                    $args['img_thumb_path'] = $file['img_thumb_path'];
                    $args['img_size'] = $file['img_size'];
                }
            }
            /* добавляем отзыв в базу */
            updateItem($db, $parts[0], $args);
            break;
        /* метод возврата данных для ajax-запроса */
        case 'getitem':
            /* проверяем наличие id элемента */
            if(isset($_POST['id'])) {
                /* получаем данные из базы */
                $data = getItem($db, $parts[0], (int)$_POST['id']);
                /* формируем json обьект для ответа на ajax-запрос */
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
                exit();
            }
            break;
    }
    /* переходим на главную */
    header('Location: ./index.php?r=' . $parts[0] . '/index');
}