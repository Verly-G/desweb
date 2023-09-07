<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $filmeDelete = file_get_contents('php://input');
  $filmeMatriz = json_decode($filmeDelete, true);
  $id = (isset($filmeMatriz["id"]) && $filmeMatriz["id"] != null) ? $filmeMatriz["id"] : null;
  if( $id != null && $autenticado===true){
    try {
        $sql = "DELETE FROM filmes_assistidos WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        responder(false,"Filme de id {$id} excluido com sucesso. {$stmt->rowCount()} linhas afetadas.");
    }catch(PDOException $e){
        responder(true,"Erro ao excluir filme. {$e->getMessage()}");
    }
}else
    responder(true,"informações não recebidas");
?>
