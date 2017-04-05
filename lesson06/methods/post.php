<?php
/* проверяем массив POST-запроса */
if(!empty($_POST) && isset($_POST['r']) && $_POST['r'] != '') {
    /* если в запросе есть переменная type, разбиваем ее на части */
    $parts = explode('/', (string)$_POST['r']);
    switch($parts[1]) {
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
            if(!empty($_FILES)) {
                $file = uploadImage($db, $_FILES);
                if($file && !empty($file)) {
                    $args['img_name'] = $file['img_name'];
                    $args['img_orig_path'] = $file['img_orig_path'];
                    $args['img_thumb_path'] = $file['img_thumb_path'];
                    $args['img_size'] = $file['img_size'];
                }
            }
            //var_dump($args); die();
            /* добавляем элемент в базу */
            createItem($db, $parts[0], $args);
            break;
        case 'update': 
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
            break;
        case 'getitem':
            if(isset($_POST['id'])) {
                $data = getItem($db, $parts[0], (int)$_POST['id']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
                exit();
            }
            break;
    }
    /* переходим на главную */
    header('Location: ./index.php?r=' . $parts[0] . '/index');
}