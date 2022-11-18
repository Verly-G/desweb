<?php

    require_once "conexao.php";

    $sql = "SELECT * FROM produto";

    try{

        $retorno = $conexao->query($sql);
        $produto = $retorno->fetchAll(PDO::FETCH_ASSOC);

        foreach($produto as $produto){
            foreach($produto as $key => $value){
                echo "{$key}: {$value} <br>";
            }
            echo "<hr>";
        }


    }catch(PDOException $e){
        echo "Select não efetuado ".$e->getMessage()."<br>";
    }

?>