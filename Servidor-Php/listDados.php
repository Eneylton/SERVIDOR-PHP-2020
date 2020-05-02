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

	$query = $conexao->prepare('SELECT * FROM `produto` order by id asc');

		$query->execute();

		$out = "[";

		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"codigo": "'.$result["id"].'",';
			$out .= '"nome": "'.$result["nome"].'",';
			$out .= '"qdt": "'.$result["qdt"].'",';
			$out .= '"descricao": "'.$result["descricao"].'",';
			$out .= '"foto": "'.$result["foto"].'",';
			$out .= '"valor": "'.$result["valor"].'",';
			$out .= '"status": "'.$result["status"].'",';
			$out .= '"data": "'.$result["data"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
