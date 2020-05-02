<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/html; charset=utf-8");

include "library/connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['crud'] == 'adicionar'){
    $data = array();

    $query   = mysqli_query($mysqli, "INSERT INTO localizar SET
               cep         = '$postjson[cep]',
               endereco    = '$postjson[endereco]',
               bairro      = '$postjson[bairro]',
               cidade      = '$postjson[cidade]',
               estado      = '$postjson[estado]',
               foto        = '$postjson[foto]',
               pin         = '$postjson[pin]',
               lat         = '$postjson[lat]',
               lng         = '$postjson[lng]'

    ");

    $idadd = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success' => true, 'idadd' => $idadd));
    else $result = json_encode(array('success'=> false));
    echo $result;
}

    elseif($postjson['crud'] == 'listar'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM localizar ORDER BY id DESC");

        while($row = mysqli_fetch_array($query)){
            $data[] = array(
				'id'           => $row['id'],
				'cep'          => $row['cep'],
				'endereco'     => $row['endereco'],
				'bairro'       => $row['bairro'],
				'cidade'       => $row['cidade'],
				'estado'       => $row['estado'],
				'foto'         => $row['foto'],
				'pin'          => $row['pin'],
				'lat'          => $row['lat'],
				'lng'          => $row['lng']
            );
        }

        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;

    }
    elseif($postjson['crud'] == 'Listar_Estatistica'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT sexo, count(*) as total FROM estatistica group by sexo");

        while($row = mysqli_fetch_array($query)){
            $data[] = array(
				'sexo'           => $row['sexo'],
				'total'          => $row['total']
            );
        }

        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;

    }

//     elseif($postjson['crud'] == 'update_user'){
  
//     $dateNow = date('Y-m_d');
  
//     $query   = mysqli_query($mysqli, "UPDATE lojista SET
	           
//                nome      =  '$postjson[nome]',
// 			   email     =  '$postjson[email]',
//                telefone  =  '$postjson[telefone]',   
//                categoria =  '$postjson[categoria]' WHERE id  = '$postjson[id]'");

    

//     if($query) $result = json_encode(array('success'=>true));
//     else $result = json_encode(array('success'=>false));
//     echo $result;
// }


//   elseif($postjson['crud'] == 'deletar'){
  
//     $query   = mysqli_query($mysqli, "DELETE FROM lojista WHERE id  = '$postjson[id]'");
  

//     if($query) $result = json_encode(array('success'=>true));
//     else $result = json_encode(array('success'=>false));
//     echo $result;
// }

	


?>