<?php

    $dns = "mysql:host=localhost;
            dbname=cinema;
            charset=utf8";

    $user = "root";
    $passw = "";
    $conexao = null;

    try{
        $conexao = new PDO($dns, $user, $passw);
        $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexão Feita!<br><br>";
    }
    catch(PDOException $e){
        echo "A conexão deu ruim";
        print_r($e);
    }

?>