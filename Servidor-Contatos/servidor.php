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

    $dateNow = date('Y-m-d');
    $query   = mysqli_query($mysqli, "INSERT INTO lojista SET
               nome          = '$postjson[nome]',
               telefone      = '$postjson[telefone]',
               email         = '$postjson[email]',
               whatsapp      = '$postjson[whatsapp]',
               hinstagram    = '$postjson[hinstagram]',
               facebook      = '$postjson[facebook]',
               cep           = '$postjson[cep]',
               endereco      = '$postjson[endereco]',
	       numero        = '$postjson[numero]',
               bairro        = '$postjson[bairro]',
               cidade        = '$postjson[cidade]',
               estado        = '$postjson[estado]',
               foto          = '$postjson[foto]'
               

    ");

    $idadd = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success' => true, 'idadd' => $idadd));
    else $result = json_encode(array('success'=> false));
    echo $result;
}

    elseif($postjson['crud'] == 'listar'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM lojista ORDER BY id DESC");

        while($row = mysqli_fetch_array($query)){
            $data[] = array(
				'id'           => $row['id'],
				'nome'         => $row['nome'],
				'telefone'     => $row['telefone'],
				'email'        => $row['email'],
				'whatsapp'     => $row['whatsapp'],
				'hinstagram'   => $row['hinstagram'],
				'facebook'     => $row['facebook'],
				'cep'          => $row['cep'],
				'endereco'     => $row['endereco'],
				'numero'       => $row['numero'],
				'bairro'       => $row['bairro'],
				'cidade'       => $row['cidade'],
				'estado'       => $row['estado'],
				'foto'       => $row['foto']
				
            );
        }

        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;

    }
	
	
	 elseif($postjson['crud'] == 'listar-paramentro'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM lojista ORDER BY id DESC LIMIT $postjson[start], $postjson[limit]");

        while($row = mysqli_fetch_array($query)){
            $data[] = array(
				'id'           => $row['id'],
				'nome'         => $row['nome'],
				'telefone'     => $row['telefone'],
				'email'        => $row['email'],
				'whatsapp'     => $row['whatsapp'],
				'hinstagram'   => $row['hinstagram'],
				'facebook'     => $row['facebook'],
				'cep'          => $row['cep'],
				'endereco'     => $row['endereco'],
				'numero'       => $row['numero'],
				'bairro'       => $row['bairro'],
				'cidade'       => $row['cidade'],
				'estado'       => $row['estado'],
				'foto'       => $row['foto']
				
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