<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/html; charset=utf-8");

include "library/connect.php";

$postjson = json_decode(file_get_contents('php://input'),true);

if($postjson['crud'] == 'adicionar'){
  

    $radom     = date('Y-m-d_H_i_s');
	
	$entry     = base64_decode($postjson['imagens']);
	
	$img       = imagecreatefromstring($entry);
	
	$directory = "imgs/img_user".$radom.".jpg";
	$directory2 = "C:/Users/eneyl/Downloads/Projetos/Ionic2020/PROJETOS/app-redes-sociais-banco-mysql/www/assets/imgs/img_user" .$radom.".jpg";
	
	imagejpeg($img, $directory);
	imagejpeg($img, $directory2);
	
	imagedestroy($img);
	
    
    $query   = mysqli_query($mysqli, "INSERT INTO lojista SET
               imagens     = '$directory'

    ");

    $idadd = mysqli_insert_id($mysqli);

    if($query) $result = json_encode(array('success' => true, 'idadd' => $idadd));
    else $result = json_encode(array('success'=> false));
    echo $result;
}

    elseif($postjson['crud'] == 'listar_fotos'){

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM lojista ORDER BY id DESC");

        while($row = mysqli_fetch_array($query)){
            $data[] = array(
				'id'           => $row['id'],
				'imagens'      => $row['imagens']
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