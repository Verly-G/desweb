<?php

    require_once 'conexao.php';

    $sql = 'DELETE FROM filme
            WHERE imdb < 6';
    
    try{
        $retorno = $conexao->exec($sql);
        echo "Os filmes com o imdb menor que 6 foram deletados.";
    }
    catch(PDOException $e){
        echo "Erro ao deletar os filmes com imdb menor que 6".$e->getMessage()."<br>";
    }

?>