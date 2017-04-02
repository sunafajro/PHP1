<?php
define('SITE_ROOT', "../");
define('WWW_ROOT', SITE_ROOT . '/public');

/* DB config */
define('HOST', 'localhost');
define('USER', 'test_user');
define('PASS', 'pass');
define('DB', 'test');

define('DATA_DIR', SITE_ROOT . 'data');
define('LIB_DIR', SITE_ROOT . 'engine');
define('TPL_DIR', SITE_ROOT . 'templates');

define('SITE_TITLE', '���� 5');

require_once(LIB_DIR . '/functions.php');
require_once(LIB_DIR . '/db.php');

