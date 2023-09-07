<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $filmePut = file_get_contents('php://input');
  $filmeMatriz = json_decode($filmePut, true);
  //Validação e higienização
  $id = (isset($filmeMatriz["id"]) && $filmeMatriz["id"] >0) 
  ? strtoupper($filmeMatriz["id"]) : ""; 
  $titulo = (isset($filmeMatriz["titulo"]) && $filmeMatriz["titulo"] != null) 
  ? strtoupper($filmeMatriz["titulo"]) : "";
  $avaliacao = (isset($filmeMatriz["avaliacao"]) && $filmeMatriz["avaliacao"] != null) 
  ? $filmeMatriz["avaliacao"] : "";
  $generoId = (isset($filmeMatriz["genero_id"]) && $filmeMatriz["genero_id"] > 0) 
  ? $filmeMatriz["genero_id"] : "";
  if( $titulo != "" && $avaliacao != "" && $autenticado===true){
    try {
        $sql = "UPDATE filmes_assistidos SET titulo=?,avaliacao=?, genero_id = ? WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $titulo );
        $stmt->bindParam(2, $avaliacao);
        $stmt->bindParam(3, $generoId);
        $stmt->bindParam(4, $id);  
        $stmt->execute();
        responder(false,"Filme de id {$id} alterado com sucesso. {$stmt->rowCount()} linhas afetadas.");
      }catch(PDOException $e){
          responder(true,"Erro ao alterar filme. {$e->getMessage()}");
      }
  }else
      responder(true,"informações não recebidas");
?>
