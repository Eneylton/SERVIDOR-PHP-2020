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
        $query = mysqli_query($mysqli, "SELECT * FROM produto WHERE loja_id = $postjson[loja_id]  ORDER BY id DESC LIMIT $postjson[start], $postjson[limit]");
    
        while($row = mysqli_fetch_array($query)){
            $data[] = array(
                'id'           => $row['id'],
                'nome'         => $row['nome'],
                'website'      => $row['website'],
                'quantidade'   => $row['quantidade'],
                'money'        => $row['money'],
                'descricao'    => $row['descricao'],  
                'loja_id'      => $row['loja_id'],  
                'foto'         => $row['foto']
                
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
    
    $query   = mysqli_query($mysqli, "INSERT INTO produto SET
               nome         = '$postjson[nome]',
               website      = '$postjson[website]',
               quantidade   = '$postjson[quantidade]',
               money        = '$postjson[money]',
               descricao    = '$postjson[descricao]',
               foto         = '$directory',
               loja_id      = '$postjson[loja_id]'

    ");

    $idadd = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success' => true, 'idadd' => $idadd));
    else $result = json_encode(array('success'=> false));
    echo $result;

}

elseif($postjson['crud'] == "editar"){

    if($postjson['foto'] != ""){
     
    $radom     = date('Y-m-d_H_i_s');
	
	$entry     = base64_decode($postjson['foto']);
	
	$img       = imagecreatefromstring($entry);
	
    $directory = "Imagens/img_foto".$radom.".jpg";
	
	imagejpeg($img, $directory);
	
	imagedestroy($img);
  
    $query   = mysqli_query($mysqli, "UPDATE produto SET
	           
               nome        =  '$postjson[nome]',
               website     =  '$postjson[website]',
               money       =  '$postjson[money]',
			   quantidade  =  '$postjson[quantidade]',
               descricao   =  '$postjson[descricao]',   
               foto        =  '$directory'  WHERE id  = '$postjson[id]'");

    

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;

    }else{
    

    $query   = mysqli_query($mysqli, "UPDATE produto SET
	           
               nome        =  '$postjson[nome]',
               website     =  '$postjson[website]',
               money       =  '$postjson[money]',
			   quantidade  =  '$postjson[quantidade]',
               descricao   =  '$postjson[descricao]'  WHERE id  = '$postjson[id]'");

    

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
    }
  
}

elseif($postjson['crud'] == 'deletar'){
  
    $query   = mysqli_query($mysqli, "DELETE FROM produto WHERE id  = '$postjson[id]'");
  

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false));
    echo $result;
}




} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();

};
