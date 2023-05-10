<?php
  require_once('../model/conexao.php');
  $usuarioDelete = file_get_contents('php://input');
  $usuarioMatriz = json_decode($usuarioDelete, true);
  $id = (isset($usuarioMatriz["id"]) && $usuarioMatriz["id"] != null) ? $usuarioMatriz["id"] : null;
  $resposta["erro"] = false;$resposta["msgErro"] = "";
  $resposta["msgSucesso"] = "";$resposta["dados"] = null;
  if( $id != null ){
    try {
        $sql = "DELETE FROM usuario WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1,$id);
    
        $stmt->execute();
        $resposta["msgSucesso"] = "Usuario de id $id excluído com sucesso!";
    }catch(PDOException $e) {
      $resposta["erro"] = true;
      $resposta["msgErro"] = "Erro ao excluir Usuario. ".$e->getMessage();
    }finally{
        echo json_encode($resposta);  
        exit();
    }
  }
?>