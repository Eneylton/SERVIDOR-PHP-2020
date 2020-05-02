<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, POST, DELETE, OPTIONS");
header('Access-Control-Max-Age: 86400');
header("Access-Control-Expose-Headers: Content-Length, X-JSON");

require "Connect/connect.php";


$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['crud'] == 'adicionar'){

    echo $postjson ;
}


?>