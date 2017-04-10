<?php
/* проверяем массив POST-запроса */
if(!empty($_POST) && isset($_POST['r']) && $_POST['r'] != '') {
    /* если в запросе есть переменная type, разбиваем ее на части */
    $parts = explode('/', (string)$_POST['r']);
    $attribute = '';
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
            $parts[1] = 'index';
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
            $parts[1] = 'index';
            break;
        case 'getitem':
            if(isset($_POST['id'])) {
                $data = getItem($db, $parts[0], (int)$_POST['id']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
                exit();
            }
            break;
        case 'addbuy':
            if(isset($_POST['pid'])) {
                $cnt = 0;
                $cnt = $_COOKIE['cntItems'] + 1;
                setCookie('cntItems', $cnt);
                $data = getItem($db, 'products', (int)$_POST['pid']);
                if(isset($_COOKIE['toBuy']) && array_key_exists($data['articul'], $_COOKIE['toBuy'])) {
                    $i = (int)$_COOKIE['toBuy'][$data['articul']] + 1;
                    setCookie('toBuy[' . $data['articul'] . ']', $i);
                } else {
                    setCookie('toBuy[' . $data['articul'] . ']', 1);
                }
                echo $cnt;
                exit();
            }
            break;
        case 'delbuy':
            if(isset($_POST['pid'])) {
                $cnt = 0;
                $data = getItem($db, 'products', (int)$_POST['pid']);
                if(isset($_COOKIE['toBuy'][$data['articul']])) {
                    $cnt = (int)$_COOKIE['cntItems'] - (int)$_COOKIE['toBuy'][$data['articul']];
                    $i = 'toBuy[' . $data['articul'] . ']';
                    $j = $_COOKIE['toBuy'][$data['articul']];
                    unset($_COOKIE['toBuy'][$data['articul']]);
                    setCookie($i, $j, time() - 3600);
                    setCookie('cntItems', $cnt);
                }
                echo $cnt;
                exit();
            }
            break;
        case 'login':
            if(isset($_POST['username']) && isset($_POST['password'])) {
                /* функция аутентификации пользователя */
                $result = authUser($db, (string)$_POST['username'], $_POST['password']);
                if($result) {
                    $_SESSION['auth'] = 1;
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['fullname'] = $result['fullname'];
                    $_SESSION['role'] = $result['role'];
                }
                $parts[0] = 'users';
                $parts[1] = 'view';
                $attribute = '&id=' . $_SESSION['user_id'];
            }
            break;
    }
    /* переходим на главную */
    header('Location: ./index.php?r=' . $parts[0] . '/' . $parts[1] . $attribute);
}