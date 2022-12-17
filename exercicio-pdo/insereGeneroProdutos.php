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
        array('titulo' => 'Marcas da Maldição', 'imdb' => 6.2, 'genero_id' => 1),
        array('titulo' => 'O Telefone Preto', 'imdb' => 6.9, 'genero_id' => 1),
        array('titulo' => 'Bagdad Cafe', 'imdb' => 7.4, 'genero_id' => 2),
        array('titulo' => 'Nomadland', 'imdb' => 7.3, 'genero_id' => 2),
        array('titulo' => 'Prenda-me se for Capaz', 'imdb' => 8.1, 'genero_id' => 3),
        array('titulo' => 'O Discurso do Rei', 'imdb' => 8, 'genero_id' => 3),
        array('titulo' => 'O Peso do Talento', 'imdb' => 7, 'genero_id' => 4),
        array('titulo' => 'O Homem de Toronto', 'imdb' => 5.8, 'genero_id' => 4),
        array('titulo' => 'O Guarda-Costas', 'imdb' => 6.3, 'genero_id' => 5),
        array('titulo' => 'O Segredo de Brokeback Mountain', 'imdb' => 7.7, 'genero_id' => 5),        
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
            $sqlFilme = "INSERT INTO filme(titulo, imdb, genero_id)
            VALUES('{$filme['titulo']}', {$filme['imdb']}, {$filme['genero_id']})";

            $retornoFilme = $conexao->exec($sqlFilme);  
            echo "<br>";
            echo "Foram adicionados {$retornoFilme} filmes com sucesso.<br>";
        } 
    }catch(PDOException $e){
        echo "Erro ao tentar adicionar.<br>".$e->getMessage()."<br>";
    }

?>