<?php
  require_once('../model/conexao.php');
  $usuarioPut = file_get_contents('php://input');
  $usuarioMatriz = json_decode($usuarioPut, true);
  //id e descrição do gênero a ser alterado
  $id = (isset($usuarioMatriz["id"]) && $usuarioMatriz["id"] >0) ? $usuarioMatriz["id"] : null; 
  $nome = (isset($usuarioMatriz["nome"]) && $usuarioMatriz["nome"] != null)  ? strtoupper($usuarioMatriz["nome"]) : "";
  $login = (isset($usuarioMatriz["login"]) && $usuarioMatriz["login"] != null) ? strtoupper($usuarioMatriz["login"]) : "";
  $senha = (isset($usuarioMatriz["senha"]) && $usuarioMatriz["senha"] != null) ? strtoupper($usuarioMatriz["senha"]) : "";
  $resposta["erro"] = false; $resposta["msgErro"] = "";
  $resposta["msgSucesso"] = "";$resposta["dados"] = null;
  if( $descricao != "" && $id != ""){
    try {
        $sql = "UPDATE usuario SET nome=?,login=?,senha=?  WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $nome );$stmt->bindParam(2,$login);$stmt->bindParam(3,$senha);$stmt->bindParam(4, $id);
        $stmt->execute();
        $resposta["msgSucesso"] = "{$stmt->rowCount()} usuario alterado com sucesso! 
        O id do usuario alterado foi {$id}"; 
    }catch(PDOException $e) {
      $resposta["erro"] = true;
      $resposta["msgErro"] = "Erro: Não foi possível efetuar a alteração no BD".$e->getMessage();
    }finally{
      echo json_encode($resposta);  
    }
  }
?>