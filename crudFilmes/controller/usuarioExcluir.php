<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $usuarioDelete = file_get_contents('php://input');
  $usuarioMatriz = json_decode($usuarioDelete, true);
  $id = (isset($usuarioMatriz["id"]) && $usuarioMatriz["id"] != null) ? $usuarioMatriz["id"] : null;
  if( $id != null && $autenticado===true){
    try {
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        responder(false,"Usuário de id {$id} excluido com sucesso. {$stmt->rowCount()} linhas afetadas.");
    }catch(PDOException $e){
        responder(true,"Erro ao excluir usuário. {$e->getMessage()}");
    }
  }else
        responder(true,"informações não recebidas");
?>