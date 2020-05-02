<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/html; charset=utf-8");

include "Connect/connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);


try {

	if(!$mysqli){
		echo "Não foi possivel conectar com Banco de Dados!";
    }	
    
    if($postjson['crud'] == "listar"){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM usuario ORDER BY id DESC LIMIT $postjson[start], $postjson[limit]");

        while($row = mysqli_fetch_array($query)){
            $data[] = array(
				'id'           => $row['id'],
				'nome'         => $row['nome'],
				'email'        => $row['email'],
				'avatar'       => $row['avatar'],
				'tipo'         => $row['tipo'],
				'login'        => $row['login'],
				'senha'        => $row['senha']
				
            );
        }

        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;

    }



    elseif($postjson['crud'] == "adicionar"){
        $senha = md5($postjson['senha']);
    
        $query   = mysqli_query($mysqli, "INSERT INTO usuario SET
                   nome          = '$postjson[nome]',
                   email         = '$postjson[email]',
                   avatar        = '$postjson[avatar]',
                   tipo          = '$postjson[tipo]',
                   login         = '$postjson[login]',
                   senha         = '$senha'
                   
    
        ");
    
        $idadd = mysqli_insert_id($mysqli);
    
        if($query) $result = json_encode(array('success' => true, 'idadd' => $idadd));
        else $result = json_encode(array('success'=> false));
        echo $result;
    }

    
    elseif($postjson['crud'] == "editar"){
        $senha = md5($postjson['senha']);
      
        $query   = mysqli_query($mysqli, "UPDATE usuario SET
                   
                   nome           = '$postjson[nome]',
                   email          = '$postjson[email]',
                   avatar         = '$postjson[avatar]',
                   tipo           = '$postjson[tipo]',
                   login          = '$postjson[login]', 
                   senha          = '$senha' WHERE id  = '$postjson[id]'");
    
        
    
        if($query) $result = json_encode(array('success'=>true));
        else $result = json_encode(array('success'=>false));
        echo $result;
    }

    elseif($postjson['crud'] == "deletar"){
  
        $query   = mysqli_query($mysqli, "DELETE FROM usuario WHERE id  = '$postjson[id]'");
      
    
        if($query) $result = json_encode(array('success'=>true));
        else $result = json_encode(array('success'=>false, 'msg'=>'error, Por favor, tente novamente... '));
        echo $result;
    }
    
 
    elseif($postjson['crud'] == "acessar"){
	 
        $senha = md5($postjson['senha']);
    
        $query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE senha = '$senha' AND login = '$postjson[login]'");
        $check = mysqli_num_rows($query);
    
        if($check > 0){
        $data = mysqli_fetch_array($query);
        $datauser = array(
           
           'id'        => $data['id'],
           'nome'      => $data['nome'],
           'email'     => $data['email'],
           'tipo'      => $data['tipo'],
           'avatar'    => $data['avatar'],
           'login'     => $data['login'],
           'senha'     => $data['senha']
        
        );
        
        if($query) $result = json_encode(array('success'=>true, 'result'=> $datauser));
        else $result = json_encode(array('success'=>false, 'msg'=>'Error, Login Efetuado com sucesso... '));
        
        }else{
    
        $result = json_encode(array('success'=>false, 'msg'=>'Senha ou Usuarios Inválidos... '));
           
        }	
    
        echo $result;
    }
    
    elseif($postjson['crud'] == "perfil"){
     
        $profile = array();
        $query = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM usuario WHERE id = '$postjson[id]'"));
        
    
        $profile = array(
           
           'id'        => $query['id'],
           'nome'      => $query['nome'],
           'email'     => $query['email'],
           'tipo'      => $query['tipo'],
           'avatar'    => $query['avatar'],
           'login'     => $query['login'],
           'senha'     => $query['senha']
        
        );
        
        if($query) $result = json_encode(array('success'=>true, 'profiles'=> $profile));
        else $result = json_encode(array('success'=>false));
        echo $result;
    }

    elseif($postjson['crud'] == "editar_perfil"){
     
        $query   = mysqli_query($mysqli, "UPDATE usuario SET
                   
        nome           =  '$postjson[nome]',
        avatar         =  '$postjson[avatar]',
        email          =  '$postjson[email]' WHERE id  = '$postjson[id]'");
        
        if($query) $result = json_encode(array('success'=>true));
        else $result = json_encode(array('success'=>false));
        echo $result;
    }
    

} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();

};
