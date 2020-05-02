<?php

define('DB_NAME', 'db_help');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

date_default_timezone_set('america/sao_paulo');


$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);


?>


