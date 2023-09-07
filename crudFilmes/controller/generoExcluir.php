<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $generoDelete = file_get_contents('php://input');
  $generoMatriz = json_decode($generoDelete, true);
  $id = (isset($generoMatriz["id"]) && $generoMatriz["id"] != null) ? $generoMatriz["id"] : null;
  $resposta["erro"] = false;$resposta["msgErro"] = "";
  $resposta["msgSucesso"] = "";$resposta["dados"] = null;
  if( $id != null && $autenticado===true){
    try {
        $sql = "DELETE FROM generos WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1,$id); 
        $stmt->execute();
        responder(false,"Genero de id {$id} excluido com sucesso. {$stmt->rowCount()} linhas afetadas.");
    }catch(PDOException $e){
        responder(true,"Erro ao excluir genero. {$e->getMessage()}");
    }
}else
    responder(true,"informações não recebidas");
?>