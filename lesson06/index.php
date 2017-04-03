<?php
/* подключаем файл для работы с базой*/
require_once('./db/db.php');

/* если база недоступна выводим сообщение и завершаем работу */
if($message_error) { 
    exit($message_error);
}

require_once('./methods/functions.php');

require_once('./methods/router.php');

echo renderPage($db, $variables);