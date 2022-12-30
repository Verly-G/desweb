<?php

    require_once 'conexao.php';

    $sql = 'SELECT f.id, f.titulo, f.data_lanc, f.imdb, f.genero_id, g.descricao FROM filme f
            INNER JOIN genero g ON(g.id = f.genero_id);';

    try{
        $retorno = $conexao->query($sql);
        $filme = $retorno->fetchAll(PDO::FETCH_ASSOC);

        echo "FAZENDO COM MATRIZ ASSOCIATIVA: <br><br>";
        foreach($filme as $filme){
            foreach($filme as $key => $value){
                echo "{$key}: {$value} <br>";
            }
            echo "<br>";
        }
    }catch(PDOException $e){
        echo "Select não efetuado ".$e->getMessage()."<br>";
    }

    try{
        $retorno = $conexao->query($sql);
        $filme = $retorno->fetchAll(PDO::FETCH_OBJ);
        echo "FAZENDO COM OBJETO:   <br><br>";
        for($i = 0; $i < count($filme); $i++){
            echo "Id: {$filme[$i]->id} <br>
            Título: {$filme[$i]->titulo}<br>
            Data de lançamento: {$filme[$i]->data_lanc}
            Imdb: {$filme[$i]->imdb}<br>
            Gênero Id: {$filme[$i]->genero_id} <br>
            Gênero Descrição: {$filme[$i]->descricao}";
            echo "<br>";
        }
    }catch(PDOException $e){
        echo "Erro ao tentar consultar.<br>".$e->getMessage()."<br>";
    }
?>