<?php

    require_once 'conexao.php';

    $genero = array(
        array('descricao' => 'Terror'),
        array('descricao' => 'Drama'),
        array('descricao' => 'Ficção Científica'),
        array('descricao' => 'Comédia'),
        array('descricao' => 'Romance')
    );

    $filme = array(
        array('titulo' => 'Marcas da Maldição', 'data_lanc'=> '2022-03-18', 'imdb' => 6.2, 'genero_id' => 1),
        array('titulo' => 'O Telefone Preto', 'data_lanc'=> '2022-07-21', 'imdb' => 6.9, 'genero_id' => 1),
        array('titulo' => 'Bagdad Cafe', 'data_lanc'=> '1987-11-12', 'imdb' => 7.4, 'genero_id' => 2),
        array('titulo' => 'Nomadland', 'data_lanc'=> '2021-04-15', 'imdb' => 7.3, 'genero_id' => 2),
        array('titulo' => 'Prenda-me se for Capaz', 'data_lanc'=> '2003-02-21', 'imdb' => 8.1, 'genero_id' => 3),
        array('titulo' => 'O Discurso do Rei', 'data_lanc'=> '2011-02-11', 'imdb' => 8, 'genero_id' => 3),
        array('titulo' => 'O Peso do Talento', 'data_lanc'=> '2022-05-12', 'imdb' => 7, 'genero_id' => 4),
        array('titulo' => 'O Homem de Toronto', 'data_lanc'=> '2022-06-24', 'imdb' => 5.8, 'genero_id' => 4),
        array('titulo' => 'O Guarda-Costas', 'data_lanc'=> '1993-01-15', 'imdb' => 6.3, 'genero_id' => 5),
        array('titulo' => 'O Segredo de Brokeback Mountain', 'data_lanc'=> '2006-02-03', 'imdb' => 7.7, 'genero_id' => 5),        
    );

    try{
        foreach($genero as $genero){
            $sqlGenero = "INSERT INTO genero(descricao)
            VALUES('{$genero['descricao']}')";

            $retornoGenero = $conexao->exec($sqlGenero);  
            echo "<br>";
            echo "Foram adicionados {$retornoGenero} genêros com sucesso.<br>";
        }   

        foreach($filme as $filme){
            $sqlFilme = "INSERT INTO filme(titulo, imdb, data_lanc, genero_id)
            VALUES('{$filme['titulo']}', '{$filme['imdb']}', '{$filme['data_lanc']}', '{$filme['genero_id']}')";

            $retornoFilme = $conexao->exec($sqlFilme);  
            echo "<br>";
            echo "Foram adicionados {$retornoFilme} filmes com sucesso.<br>";
        } 
    }catch(PDOException $e){
        echo "Erro ao tentar adicionar.<br>".$e->getMessage()."<br>";
    }

?>