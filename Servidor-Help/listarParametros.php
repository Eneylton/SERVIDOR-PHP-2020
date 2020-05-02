<?php




if(isset($_GET["email"]) || isset($_GET["nome"]) ){
        if(!empty($_GET["email"]) || !empty($_GET["nome"])  ){
    
            require 'Connect/config.php';
		   
		   $email= $_GET["email"];
           $nome= $_GET["nome"];
		   
		   $sql = $conexao->prepare("SELECT * FROM usuario where email= $email and nome= $nome ");
		   
		   $sql->execute();
		   
		   $outp = "";
		   
		   if($rs=$sql->fetch()) {
			   if ($outp != "") {$outp .= ",";}
		       
			   
			   $outp .= '{"id":"'  . $rs["id"] . '",';
			   $outp .= '"nome":"'   . $rs["nome"]. '",';
               $outp .= '"email":"'   . $rs["email"]. '"}';
			   
			   $outp ='{"msg": {"logado": "sim", "texto": "logado com sucesso!"}, "dados": '.$outp.'}';
		   
		       }else{
			  
			   $outp ='{"msg": {"logado": "nao", "texto": "login ou senha invalidos!"}, "dados": {'.$outp.'}}';
		   
		       }
			   
			   echo utf8_encode($outp); 
		   
		   
}

}


?>
