<?php
  require_once("../model/funcoesUtil.php");
  $conexao = getConexao();
  $usuarioPost = file_get_contents('php://input');
  $usuarioMatriz = json_decode($usuarioPost, true);
  $login = (isset($usuarioMatriz["login"]) && $usuarioMatriz["login"] != null) 
  ? $usuarioMatriz["login"] : "";
  $senha = (isset($usuarioMatriz["senha"]) && $usuarioMatriz["senha"] != null) 
  ? $usuarioMatriz["senha"] : "";
  $senha = hash('sha256',$senha);
  if( $login != "" && $senha != ""){
    try {
        $sql = "SELECT id,nome FROM usuarios WHERE login=? and senha =?";
        //Prepara a instrução e em seguida passa os argumentos. Evita SQL Injection
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $login );
        $stmt->bindParam(2, $senha);
        $stmt->execute();
        if($stmt->rowCount()>0){
            $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(session_status() === PHP_SESSION_NONE){
              session_start();
              $_SESSION['usuario'] = $dados[0]["nome"]; 
              $_SESSION['usuario_id'] = $dados[0]["id"]; 
              $_SESSION['ultima_atividade'] = time(); 
              responder(false,"Sessao Criada com sucesso",$dados);
            }else
            responder(false,"Usuário com sucesso",$dados);
        }else
            responder(true,"Erro: Usuário não logado. Login e ou senha inválidos");
    }catch(PDOException $e) {
        responder(true,"Erro: Usuário não logado".$e->getMessage());
    }
  }
?>