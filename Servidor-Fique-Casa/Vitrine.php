<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: text/html; charset=utf-8");

include "Connect/connect.php";

$postjson = json_decode(file_get_contents('php://input'), true);


try {

    if (!$mysqli) {
        echo "Não foi possivel conectar com Banco de Dados!";
    }


    if ($postjson['crud'] == 'listar') {

        $data = array();
        $query = mysqli_query($mysqli, "SELECT * FROM produto  ORDER BY id DESC LIMIT $postjson[start], $postjson[limit]");

        while ($row = mysqli_fetch_array($query)) {
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

        if ($query) $result = json_encode(array('success' => true, 'result' => $data));
        else $result = json_encode(array('success' => false));
        echo $result;
    } 
    
    
    
    elseif ($postjson['crud'] == 'listar_pedidos') {
        $data = array();
    
        $query = mysqli_query($mysqli, "SELECT  p.id,
                                                p.nome as nome,
                                                p.foto as foto,
                                                p.money as money,
                                                p.descricao as descricao,
                                                p.data as data,
                                                p.website as website,
                                                l.email as email,  
                                                l.tel as tel,
                                                l.whatsapp as whatsapp,
                                                l.facebook as facebook,
                                                l.hist as hist,
                                                l.endereco as endereco,
                                                l.numero as numero,
                                                l.bairro as bairro,
                                                l.cidade as cidade,
                                                l.estado as estado,
                                                l.cep as cep
                                        FROM loja as l inner join produto as p on (l.id = p.loja_id)
                                        WHERE p.id = $postjson[id]");

        while ($row = mysqli_fetch_array($query)) {
            $data[] = array(
                'id'           => $row['id'],
                'nome'         => $row['nome'],
                'foto'         => $row['foto'],
                'money'        => $row['money'],
                'descricao'    => $row['descricao'],
                'data'         => $row['data'],
                'website'      => $row['website'],
                'email'        => $row['email'],
                'tel'          => $row['tel'],
                'facebook'     => $row['facebook'],
                'hist'         => $row['hist'],
                'whatsapp'     => $row['whatsapp'],
                'endereco'     => $row['endereco'],
                'numero'       => $row['numero'],
                'bairro'       => $row['bairro'],
                'cidade'       => $row['cidade'],
                'estado'       => $row['estado'],
                'cep'          => $row['cep']
                

            );
        }

        if ($query) $result = json_encode(array('success' => true, 'result' => $data));
        else $result = json_encode(array('success' => false));
        echo $result;
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
};
