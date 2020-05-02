<?php
define('DB_NAME', 'db_fique_casa');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

date_default_timezone_set('america/sao_paulo');

?>
