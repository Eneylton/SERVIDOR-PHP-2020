<?php
define('HOST','localhost');

define('USER','root');

define('PASS','');

define('DB', 'db_lojas');

$mysqli = mysqli_connect(HOST,USER,PASS,DB);

 if (!$mysqli){
    die("Error ao Connectar" . mysqli_connect_error()) ;
}else{
die("Conexão Bem sucedida");

?>