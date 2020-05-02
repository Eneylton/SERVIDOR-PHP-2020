<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/json; charset=utf-8");
 


include "library/connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);


if($postjson['crud'] == 'login'){

    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM lojista WHERE usuario='$postjson[usuario]' AND senha='$postjson[senha]' ORDER BY id DESC");

   
    $check = mysqli_num_rows($query);

    
    if($check > 0){
    while($row = mysqli_fetch_array($query)){
        $data[] = array(
            'id'           => $row['id'],
            'senha'        => $row['senha'],
            'usuario'      => $row['usuario']
        );

    }

    if($query) $result = json_encode(array('success' => true,'result' =>$data));
    else $result = json_encode(array('success'=> false));
    echo $result;

}else{

    if($query) $result = json_encode(array('success' => true,'result' =>$data));
    else $result = json_encode(array('success'=> false));
    echo $result;
}
    

}


?>