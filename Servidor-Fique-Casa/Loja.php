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


    if($postjson['crud'] == 'listar'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM loja ORDER BY id DESC LIMIT $postjson[start], $postjson[limit]");
    
        while($row = mysqli_fetch_array($query)){
            $data[] = array(
                'id'           => $row['id'],
                'nome'         => $row['nome'],
                'email'        => $row['email'],
                'tel'          => $row['tel'],
                'whatsapp'     => $row['whatsapp'],
                'facebook'     => $row['facebook'],
                'hist'         => $row['hist'],
                'website'      => $row['website'],
                'endereco'     => $row['endereco'],
                'numero'       => $row['numero'],
                'bairro'       => $row['bairro'],
                'cidade'       => $row['cidade'],
                'estado'       => $row['estado'],
                'data'         => $row['data'],
                'cep'          => $row['cep'],
                'lat'          => $row['lat'],
                'lng'          => $row['lng'],
                'tipo_loja_id' => $row['tipo_loja_id'],
                'foto'         => $row['foto'],
                'usuario_id'   => $row['usuario_id']
                
            );
        }
    
        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;
    
    }

    elseif($postjson['crud'] == 'listar_emp'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM tipo_empreendimento ORDER BY descricao ASC");
    
        while($row = mysqli_fetch_array($query)){
            $data[] = array(
                'id'           => $row['id'],
                'descricao'    => $row['descricao']
            );
        }
    
        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;
    
    }


    elseif($postjson['crud'] == 'check_email'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM loja");
    
        while($row = mysqli_fetch_array($query)){
            $data[] = array(
                'email'           => $row['email']
            );
        }
    
        if($query) $result = json_encode(array('success' => true,'result' =>$data));
        else $result = json_encode(array('success'=> false));
        echo $result;
    
    }

elseif($postjson['crud'] == 'adicionar'){  

    $data = array();

    $radom     = date('Y-m-d_H_i_s');
	
	$entry     = base64_decode($postjson['foto']);
	
	$img       = imagecreatefromstring($entry);
	
	$directory = "Imagens/img_foto".$radom.".jpg";
	
	imagejpeg($img, $directory);
	
	imagedestroy($img);
    
    $query   = mysqli_query($mysqli, "INSERT INTO loja SET
                nome         =  '$postjson[nome]',
                email        =  '$postjson[email]',
                tel          =  '$postjson[tel]',
                hist         =  '$postjson[hist]',
                whatsapp     =  '$postjson[whatsapp]',
                facebook     =  '$postjson[facebook]',
                website      =  '$postjson[website]',
                endereco     =  '$postjson[endereco]',
                numero       =  '$postjson[numero]',
                bairro       =  '$postjson[bairro]',
                cidade       =  '$postjson[cidade]',
                estado       =  '$postjson[estado]',
                cep          =  '$postjson[cep]',
                lat          =  '$postjson[lat]',
                lng          =  '$postjson[lng]',
                tipo_loja_id =  '$postjson[tipo_loja_id]',
                foto         =  '$directory',
                usuario_id   =  '$postjson[usuario_id]'


    ");

    $idadd = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success' => true, 'idadd' => $idadd));
    else $result = json_encode(array('success'=> false));
    echo $result;

}

elseif($postjson['crud'] == "editar"){

    if($postjson['foto1'] == "null"){

        $query   = mysqli_query($mysqli, "UPDATE loja SET
	           
               nome         =  '$postjson[nome]',
               email        =  '$postjson[email]',
               tel          =  '$postjson[tel]',
               whatsapp     =  '$postjson[whatsapp]',
               facebook     =  '$postjson[facebook]',
               hist         =  '$postjson[hist]',
               website      =  '$postjson[website]',
               endereco     =  '$postjson[endereco]',
               numero       =  '$postjson[numero]',
               bairro       =  '$postjson[bairro]',
               cidade       =  '$postjson[cidade]',
               estado       =  '$postjson[estado]',
               cep          =  '$postjson[cep]'   WHERE id  = '$postjson[id]'");

    

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
     
    
    }else{


    $radom     = date('Y-m-d_H_i_s');
	
	$entry     = base64_decode($postjson['foto']);
	
	$img       = imagecreatefromstring($entry);
	
    $directory = "Imagens/img_foto".$radom.".jpg";
	
	imagejpeg($img, $directory);
	
	imagedestroy($img);
  
    $query   = mysqli_query($mysqli, "UPDATE loja SET
	           
               nome         =  '$postjson[nome]',
               email        =  '$postjson[email]',
               tel          =  '$postjson[tel]',
               whatsapp     =  '$postjson[whatsapp]',
               facebook     =  '$postjson[facebook]',
               hist         =  '$postjson[hist]',
               website      =  '$postjson[website]',
               endereco     =  '$postjson[endereco]',
               numero       =  '$postjson[numero]',
               bairro       =  '$postjson[bairro]',
               cidade       =  '$postjson[cidade]',
               estado       =  '$postjson[estado]',
               cep          =  '$postjson[cep]',   
               usuario_id   =  '$postjson[usuario_id]', 
               foto         =  '$directory'  WHERE id  = '$postjson[id]'");

    

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;

    

    
    }
  
}

elseif($postjson['crud'] == 'deletar'){
  
    $query   = mysqli_query($mysqli, "DELETE FROM loja WHERE id  = '$postjson[id]'");
  

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
}




} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();

};
