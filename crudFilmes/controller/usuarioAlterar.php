<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $usuarioPut = file_get_contents('php://input');
  $usuarioMatriz = json_decode($usuarioPut, true);
  //id e nome do usuario a ser alterado
  $id = (isset($usuarioMatriz["id"]) && $usuarioMatriz["id"] >0) ? $usuarioMatriz["id"] : null; 
  $nome = (isset($usuarioMatriz["nome"]) && $usuarioMatriz["nome"] != null) 
  ? $usuarioMatriz["nome"] : "";
  if( $nome != "" && $id != "" && $autenticado===true){
    try {
        $sql = "UPDATE usuarios SET nome=? WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $nome );
        $stmt->bindParam(2, $id);
        $stmt->execute();
        responder(false,"Usuário de id {$id} alterado com sucesso. {$stmt->rowCount()} linhas afetadas.");
      }catch(PDOException $e){
          responder(true,"Erro ao alterar usuário. {$e->getMessage()}");
      }
  }else
      responder(true,"informações não recebidas");
?>