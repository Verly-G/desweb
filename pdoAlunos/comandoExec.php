<?php
	require_once "conexao.php";
    
    //CREATE TABLE
    /*$comandoSql= "CREATE TABLE IF NOT EXISTS user(id INT AUTO_INCREMENT PRIMARY KEY,
    login CHAR(6) NOT NULL, senha CHAR(6) NOT NULL) ENGINE = INNODB";

    try{
        $retorno = $conexao->exec($comandoSql);
        echo "Tabela criada (ou ja existia) com sucesso . {$retorno}<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar criar a tabela.".$e->getMessage()."<br>";
    }*/

    //INSERT
    /*$comandoSql = "INSERT INTO user VALUES(1, 'rafael', '123456'), (2, 'renata', '123456'),
    (3, 'verly', '234567'), (4, 'vitor', '123459')";

    try{
        $retorno = $conexao->exec($comandoSql);
        echo "Foram inseridos {$retorno} registros.<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar inserir.".$e->getMessage()."<br>";
    }*/


    //UPDATE
    /*$comandoSql = "UPDATE user set login = 'verlly' WHERE login='verly' ";

    try{
        $retorno = $conexao->exec($comandoSql);
        echo "Foram alterados {$retorno} registros.<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar alterar.".$e->getMessage()."<br>";
    }*/

    //DELETE

    $comandoSql = "DELETE FROM user WHERE login='verlly' ";

    try{
        $retorno = $conexao->exec($comandoSql);
        echo "Foram removidos {$retorno} com sucesso.<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar remover.<br>".$e->getMessage()."<br>";
    }
?>