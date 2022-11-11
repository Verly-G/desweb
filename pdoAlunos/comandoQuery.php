<?php
	require_once "conexao.php";
    //SELECT fetchall()
    /*$comandoSql = 'SELECT * FROM user';

    try{
        $retorno = $conexao->query($comandoSql);
        $usuarios = $retorno->fetchAll();
        echo "<pre>";
        var_dump($usuarios);
        echo "<pre>";
        echo "<hr>";
        echo "Acessando a posição 0 pelo nome das colunas.<br>";
        echo "Id: {$usuarios[0]['id']} <br>Login: {$usuarios[0]['login']} <br>";
        echo "Acessando a posição 0 pelo indice das colunas.<br>";
        echo "<hr>";
        echo "Id: {$usuarios[0][0]} <br>Login: {$usuarios[0][1]} <br>";
        echo "Consulta efetuada com sucesso.<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar consultar.<br>".$e->getMessage()."<br>";
    }*/

    //SELECT com fetchALl turbinado
    $comandoSql = 'SELECT * FROM user';

    try{
        $retorno = $conexao->query($comandoSql);
        $usuarios = $retorno->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        var_dump($usuarios);
        echo "<pre>";
        echo "<hr>";
        echo "Acessando a posição 0 pelo nome das colunas.<br>";
        echo "Id: {$usuarios[0]['id']} <br>Login: {$usuarios[0]['login']} <br>";
        /*echo "Acessando a posição 0 pelo indice das colunas.<br>";
        echo "<hr>";
        echo "Id: {$usuarios[0][0]} <br>Login: {$usuarios[0][1]} <br>";*/
        echo "Consulta efetuada com sucesso.<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar consultar.<br>".$e->getMessage()."<br>";
    }

?>