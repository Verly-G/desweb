<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $filmePost = file_get_contents('php://input');
  $filmeMatriz = json_decode($filmePost, true);
  //Recupera os dados vindos da VIEW
  $titulo = (isset($filmeMatriz["titulo"]) && $filmeMatriz["titulo"] != null) 
  ? strtoupper($filmeMatriz["titulo"]) : "";
  $avaliacao = (isset($filmeMatriz["avaliacao"]) && $filmeMatriz["avaliacao"] != null) 
  ? $filmeMatriz["avaliacao"] : "";
  $generoId = (isset($filmeMatriz["genero_id"]) && $filmeMatriz["genero_id"] > 0) 
  ? $filmeMatriz["genero_id"] : "";

  if( $titulo != "" && $avaliacao != "" && $autenticado===true){
    try {
        $sql = "INSERT INTO filmes_assistidos(titulo,avaliacao,genero_id) VALUES(?,?,?)";
        //Prepara a instrução e em seguida passa os argumentos. Evita SQL Injection
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $titulo );
        $stmt->bindParam(2, $avaliacao);
        $stmt->bindParam(3, $generoId); 
        $stmt->execute();
        responder(false,"Filme de id {$conexao->lastInsertId()} inserido com sucesso");
      }catch(PDOException $e){
          responder(true,"Erro ao inserir filme. {$e->getMessage()}");
      }
  }else
      responder(true,"informações não recebidas");
?>