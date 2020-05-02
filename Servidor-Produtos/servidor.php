<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/html; charset=utf-8");

include "library/connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['crud'] == 'Listar_Produtos'){

    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM produto ORDER BY id DESC");

    while($row = mysqli_fetch_array($query)){
        $data[] = array(
            'id'                         => $row['id'],
            'codigo'                     => $row['codigo'],
            'nome'                       => $row['nome'],
            'preco_venda'                => $row['preco_venda'],
            'preco_promocional'          => $row['preco_promocional'],
            'form_pagamento'            => $row['form_pagamento'],
            'descricao'                  => $row['descricao'],
            'categoria_id'               => $row['categoria_id']
            
        );
    }

    if($query) $result = json_encode(array('success' => true,'result' =>$data));
    else $result = json_encode(array('success'=> false));
    echo $result;

}

	

    elseif($postjson['crud'] == 'update_user'){
  
    $dateNow = date('Y-m_d');
  
    $query   = mysqli_query($mysqli, "UPDATE lojista SET
	           
               nome      =  '$postjson[nome]',
			   email     =  '$postjson[email]',
               telefone  =  '$postjson[telefone]',   
               categoria =  '$postjson[categoria]' WHERE id  = '$postjson[id]'");

    

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
}


  elseif($postjson['crud'] == 'deletar'){
  
    $query   = mysqli_query($mysqli, "DELETE FROM lojista WHERE id  = '$postjson[id]'");
  

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
}

	


?>