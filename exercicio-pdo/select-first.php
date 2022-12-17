<?php

    require_once 'conexao.php';

    $sql = 'SELECT filme.id, filme.titulo, filme.imdb, filme.genero_id, genero.descricao FROM filme
            INNER JOIN genero ON(filme.genero_id = genero.id);';
    
    try{
        $retorno = $conexao->query($sql);
        $filme = $retorno->fetchAll();
        echo "Id: {$filme[0]['id']} <br>
              Título: {$filme[0]['titulo']} <br> 
              Imdb: {$filme[0]['imdb']} <br> 
              Gênero: Id: {$filme[0]['genero_id']} Nome: {$filme[0]['descricao']}<br>";
    }catch(PDOException $e){
        echo "Erro ao tentar consultar.".$e->getMessage()."<br>";
    }

?>