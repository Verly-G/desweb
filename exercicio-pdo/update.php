<?php

    require_once 'conexao.php';

    $sql = "UPDATE filme SET imdb = imdb * 1.1
            WHERE genero_id = 2";
    
    try{
        $retorno = $conexao->exec($sql);
        echo "O imdb dos filmes do gênero Drama foram alterados com sucesso";
    }
    catch(PDOException $e){
        echo "Erro ao alterar o campo.<br>".$e->getMessage()."<br>";
    }


?>