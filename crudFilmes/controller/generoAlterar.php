<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $generoPut = file_get_contents('php://input');$generoMatriz = json_decode($generoPut, true);
  //id e descrição do gênero a ser alterado
  $id = (isset($generoMatriz["id"]) && $generoMatriz["id"] >0) ? $generoMatriz["id"] : null; 
  $descricao = (isset($generoMatriz["descricao"]) && $generoMatriz["descricao"] != null) 
  ? strtoupper($generoMatriz["descricao"]) : "";
  if( $descricao != "" && $id != "" && $autenticado===true){
    try {
        $sql = "UPDATE generos SET descricao=? WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $descricao );$stmt->bindParam(2, $id);
        $stmt->execute();
        responder(false,"Genero de id {$id} alterado com sucesso. {$stmt->rowCount()} linhas afetadas.");
      }catch(PDOException $e){
          responder(true,"Erro ao alterar genero. {$e->getMessage()}");
      }
  }else
      responder(true,"informações não recebidas");
?>