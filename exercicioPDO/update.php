<?php

    require_once "conexao.php";

    $sql = "UPDATE produto SET preco_de_custo = preco_de_custo * 0.8 WHERE preco_de_custo >= 600";

    try{
        for($i = 0; $i <2; $i++){
            $retorno = $conexao->exec($sql);
            echo "Foram alterados {$retorno} registros.<br>";
        }
    }catch(PDOException $e){
        echo "Erro ao alterar o campo.<br>".$e->getMessage()."<br>";
    }

?>