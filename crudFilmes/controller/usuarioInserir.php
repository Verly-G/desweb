<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
  $usuarioPost = file_get_contents('php://input');
  $usuarioMatriz = json_decode($usuarioPost, true);
  $nome = (isset($usuarioMatriz["nome"]) && $usuarioMatriz["nome"] != null) 
  ? $usuarioMatriz["nome"] : "";
  $login = (isset($usuarioMatriz["login"]) && $usuarioMatriz["login"] != null) 
  ? $usuarioMatriz["login"] : "";
  $senha = (isset($usuarioMatriz["senha"]) && $usuarioMatriz["senha"] != null) 
  ? $usuarioMatriz["senha"] : "";
  $senha = hash('sha256',$senha);
  if( $nome != "" && $login != "" && $senha != "" && $autenticado===true){
    try {
        $sql = "INSERT INTO usuarios(nome,login,senha) VALUES(?,?,?)";
        //Prepara a instrução e em seguida passa os argumentos. Evita SQL Injection
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $nome );
        $stmt->bindParam(2, $login );
        $stmt->bindParam(3, $senha);
        $stmt->execute();
        responder(false,"Usuário de id {$conexao->lastInsertId()} inserido com sucesso");
        }catch(PDOException $e){
            responder(true,"Erro ao inserir usuário. {$e->getMessage()}");
        }
    }else
        responder(true,"informações não recebidas");
?>