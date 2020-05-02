<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/json; charset=utf-8");

include "Connect/connect.php";

try {
	$conexao = new PDO($host, $usuario, $senha);

	if(!$conexao){
		echo "Não foi possivel conectar com Banco de Dados!";
	}	
	
    $inicio = $_GET["inicio"];
    $fim = $_GET["fim"];
	$query = $conexao->prepare("SELECT * FROM usuario LIMIT $inicio, $fim");
 
		$query->execute();

		$out = "[";

		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"id": "'.$result["id"].'",';
			$out .= '"nome": "'.$result["nome"].'",';
			$out .= '"email": "'.$result["email"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
