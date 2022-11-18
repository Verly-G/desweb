<?php
	require_once "conexao.php";

    $comandoSql = "SELECT * FROM user order by login";

    try{
        $retorno = $conexao->query($comandoSql);
        $usuarios = $retorno->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        // var_dump($usuarios);
        print_r($usuarios);
        echo "<pre>";
        echo "<hr>";

        // echo "Percorrendo o resultado (\$usuarios) <br>";

        // for($i = 0; $i < count($usuarios); $i++){
        //     echo "Id: {$usuarios[$i]['id']}<br>";
        //     echo "Login: {$usuarios[$i]['login']}<br>";
        //     echo "<hr>";
        // }

        // echo "Percorrendo o resultado dos (\$usuarios) com forEach <br>";

        // foreach($usuarios as $usuarios){
        //     echo "Id: {$usuarios['id']}<br>";
        //     echo "Login: {$usuarios['login']}<br>";
        //     echo "<hr>";
        // }

        echo "Percorrendo o resultado dos (\$usuarios) com forEach chave e valor <br>";


        foreach($usuarios as $usuario){
            foreach($usuario as $chave => $valor){
                echo "{$chave}: {$valor} <br>";
            }
            echo "hr>";
        }


        // echo "Acessando a posição 0 pelo nome das colunas.<br>";
        // echo "Id: {$usuarios[0]['id']} <br>Login: {$usuarios[0]['login']} <br>";
        /*echo "Acessando a posição 0 pelo indice das colunas.<br>";
        echo "<hr>";
        echo "Id: {$usuarios[0][0]} <br>Login: {$usuarios[0][1]} <br>";*/


        echo "Consulta efetuada com sucesso.<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar consultar.<br>".$e->getMessage()."<br>";
    }
?>