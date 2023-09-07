<?php
  require_once("../model/autenticar.php");
  require_once("../model/funcoesUtil.php");
  $conexao = getConexao();
  $generoPost = file_get_contents('php://input');
  $generoMatriz = json_decode($generoPost, true);
  $descricao = (isset($generoMatriz["descricao"]) && $generoMatriz["descricao"] != null) 
  ? strtoupper($generoMatriz["descricao"]) : "";
  if( $descricao != "" && $autenticado===true){
    try {
        $sql = "INSERT INTO generos(descricao) VALUES(?)";
        //Prepara a instrução e em seguida passa os argumentos. Evita SQL Injection
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $descricao );
        $stmt->execute();
        responder(false,"Genero de id {$conexao->lastInsertId()} inserido com sucesso");
        }catch(PDOException $e){
            responder(true,"Erro ao inserir genero. {$e->getMessage()}");
        }
  }else
      responder(true,"informações não recebidas");
?>