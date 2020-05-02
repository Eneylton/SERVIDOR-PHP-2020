<?php
define('HOST','localhost');

define('USER','root');

define('PASS','');

define('DB', 'db_lojas');

$conexao = mysqli_connect(HOST,USER,PASS,DB);

 if (!$conexao){
    die("Error in connection" . mysqli_connect_error()) ;
}else{
die("Conexão Bem sucedida");

?>