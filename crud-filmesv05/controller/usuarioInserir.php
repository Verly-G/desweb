<?php
    //Pega conexão
    require_once('../model/conexao.php');
    //Pega os dados brutos
    $usuarioPost = file_get_contents('php://input');
    // é uma função que converte uma string JSON em um array associativo do PHP. 
    $usuarioMatriz = json_decode($usuarioPost, true);
    //login está sendo verificado se a variável $usuarioMatriz possui um índice "login" definido e não é nulo. Se a condição for verdadeira, 
    //o método strtoupper() será chamado para converter o valor da chave "login" em letras maiúsculas. 
    $login = (isset($usuarioMatriz["login"]) && $usuarioMatriz["login"] != null) ? strtoupper($usuarioMatriz["login"]) : "";
    //Está fazendo a mesma verificação igual o de cima
    $nome = (isset($usuarioMatriz["nome"]) && $usuarioMatriz["nome"] != null) ? strtoupper($usuarioMatriz["nome"]) : "";
    //O mesmo
    $senha = (isset($usuarioMatriz["senha"]) && $usuarioMatriz["senha"] != null) ? strtoupper($usuarioMatriz["senha"]) : "";

    $resposta["erro"] = false; 
    $resposta["msgErro"] = "";
    $resposta["msgSucesso"] = "";
    $resposta["dados"] = null;

    //Se os parametros abaixo estiver em branco, não entre. Se tiver alog, executa
    if($login != "" && $senha != "" && $nome != ""){
        try{
            //Inserindo os dados no sql.
            $sql = "INSERT INTO usuario(nome, login, senha) VALUES(?,?,?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $login);
            $stmt->bindParam(3, $senha);
            // Executa
            $stmt->execute();
            //Mensagem de Sucesso
            $resposta["msgSucesso"] = "{$stmt->rowCount()} Usuário inserido com sucesso!";
        }
        catch(PDOException $e){
            $resposta["erro"] = true;
            $resposta["msgErro"] = "Erro: Não deu bom :(".$e->getMessage();
        }
        finally{
            echo json_encode($resposta);
        }
    }
?>