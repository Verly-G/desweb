<?php

    $dns = "mysql:host=localhost;dbname=test;charset=utf8";
    $usuario = 'root';
    $senha = '';
    $conexao = null;
    //Tente executar o pdo
    try{
        //$conexao recebe uma conexão com uma base de dados específica
	    $conexao =  new PDO($dns, $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Conexão efetuada com sucesso!<br>";
    }
    //Se não der certo, execute o catch
    catch(PDOException $e){
        echo "Erro ao conectar com o banco de dados".$e->getMessage();
        echo "<pre>";
        print_r($e);
        echo "<pre>";
    }
    
?>