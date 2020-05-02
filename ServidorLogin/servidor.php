<?php
 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/json; charset=utf-8");


include "library/connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['crud'] == "adicionar"){
	$senha = md5($postjson['senha']);
    $data = array();

    $dateNow = date('Y-m-d');
    $query   = mysqli_query($mysqli, "INSERT INTO lojista SET
               nome          = '$postjson[nome]',
               sobrenome     = '$postjson[sobrenome]',
               telefone      = '$postjson[telefone]',
               email         = '$postjson[email]',
               usuario       = '$postjson[usuario]',
               senha         = '$senha'
               

    ");

    $idadd = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success' => true, 'idadd' => $idadd));
    else $result = json_encode(array('success'=> false));
    echo $result;
}

   elseif($postjson['crud'] == "listar-paramentro"){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM lojista ORDER BY id DESC LIMIT $postjson[start], $postjson[limit]");

        while($row = mysqli_fetch_array($query)){
            $data[] = array(
				'id'           => $row['id'],
				'nome'         => $row['nome'],
				'sobrenome'    => $row['sobrenome'],
				'telefone'     => $row['telefone'],
				'email'        => $row['email'],
				'usuario'      => $row['usuario'],
				'senha'        => $row['senha']
				
            );
        }

        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;

    }


	

    elseif($postjson['crud'] == "editar"){
  
    $dateNow = date('Y-m_d');
  
    $query   = mysqli_query($mysqli, "UPDATE lojista SET
	           
               nome           =  '$postjson[nome]',
               sobrenome      =  '$postjson[sobrenome]',
			   email          =  '$postjson[email]',
               telefone       =  '$postjson[telefone]',   
               usuario        =  '$postjson[usuario]',   
               senha          =  '$postjson[senha]' WHERE id  = '$postjson[id]'");

    

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
}


  elseif($postjson['crud'] == "deletar"){
  
    $query   = mysqli_query($mysqli, "DELETE FROM lojista WHERE id  = '$postjson[id]'");
  

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false, 'msg'=>'error, Por favor, tente novamente... '));
    echo $result;
}

 
elseif($postjson['crud'] == "acessar"){
	 
    $senha = md5($postjson['senha']);

    $query = mysqli_query($mysqli, "SELECT * FROM lojista WHERE senha = '$senha' AND usuario = '$postjson[usuario]'");
    $check = mysqli_num_rows($query);

    if($check > 0){
    $data = mysqli_fetch_array($query);
    $datauser = array(
       
       'id'        => $data['id'],
       'nome'      => $data['nome'],
       'sobrenome' => $data['sobrenome'],
       'telefone'  => $data['telefone'],
       'email'     => $data['email'],
       'usuario'   => $data['usuario'],
       'senha'     => $data['senha']
    
    );
    
    if($query) $result = json_encode(array('success'=>true, 'result'=> $datauser));
    else $result = json_encode(array('success'=>false, 'msg'=>'Error, Login Efetuado com sucesso... '));
    
    }else{

    $result = json_encode(array('success'=>false, 'msg'=>'Senha ou Usuarios Inválidos... '));
       
    }	

    echo $result;
}

elseif($postjson['crud'] == "profile"){
     
    $profile = array();
    $query = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM lojista WHERE id = '$postjson[id]'"));
    

    $profile = array(
       
       'id'        => $query['id'],
       'nome'      => $query['nome'],
       'sobrenome' => $query['sobrenome'],
       'telefone'  => $query['telefone'],
       'email'     => $query['email'],
       'usuario'   => $query['usuario'],
       'senha'     => $query['senha']
    
    );
    
    if($query) $result = json_encode(array('success'=>true, 'profiles'=> $profile));
    else $result = json_encode(array('success'=>false));
    echo $result;
}


elseif($postjson['crud'] == "profile_edit"){
     
    $query   = mysqli_query($mysqli, "UPDATE lojista SET
	           
    nome           =  '$postjson[nome]',
    email          =  '$postjson[email]' WHERE id  = '$postjson[id]'");
    
    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
}


?>