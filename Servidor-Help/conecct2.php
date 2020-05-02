<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, POST, DELETE, OPTIONS");
header('Access-Control-Max-Age: 86400');
header("Access-Control-Expose-Headers: Content-Length, X-JSON");
header("Access-Control-Allow-Headers: *");
$host = "mysql:host=localhost;dbname=db_help; charset=utf8";
$usuario = "root";
$senha = "";



/*header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, POST, DELETE, OPTIONS");
header('Access-Control-Max-Age: 86400');
header("Access-Control-Expose-Headers: Content-Length, X-JSON");
header("Access-Control-Allow-Headers: *");
$host = "mysql:host=localhost;dbname=db_catalago; charset=utf8";
$usuario = "root";
$senha = "";*/


$conexao = new PDO($host, $usuario, $senha);

?>