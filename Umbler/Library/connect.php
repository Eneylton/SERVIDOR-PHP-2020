<?php
define('DB_NAME', 'db_lojas');
define('DB_USER', 'db_lojas');
define('DB_PASSWORD', 'ene99167788');
define('DB_HOST', 'mysql873.umbler.com');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

date_default_timezone_set('america/sao_paulo');

?>
