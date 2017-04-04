<?php

/* подключаем файл для работы с базой*/
require_once('./db/db.php');

/* если база недоступна выводим сообщение и завершаем работу */
if($message_error) { 
    exit($message_error);
}

/* подключаем методы */
require_once('./methods/functions.php');

/* подключаем обработчик запросов */
require_once('./methods/router.php');

/* выводим страничку */
echo renderPage($db, $variables);