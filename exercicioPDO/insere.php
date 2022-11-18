<?php

    require_once 'conexao.php';

    $produtos = array(
        array('descricao' => 'Cadeira Gamer', 'preco_de_custo' => 950, 'estoque' => 37),
        array('descricao' => 'Teclado', 'preco_de_custo' => 249.99, 'estoque' => 20), 
        array('descricao' => 'Mouse', 'preco_de_custo' => 179.99, 'estoque' => 30), 
        array('descricao' => 'WebCam', 'preco_de_custo' => 487.67, 'estoque' => 5),
        array('descricao' => 'Notebook', 'preco_de_custo' => 6784.50, 'estoque' => 29),
        array('descricao' => 'Pista de HotWheels', 'preco_de_custo' => 89.99, 'estoque' => 64),
        array('descricao' => 'Monitor', 'preco_de_custo' => 789.99, 'estoque' => 80),
        array('descricao' => 'Whisky', 'preco_de_custo' => 60, 'estoque' => 10),
        array('descricao' => 'Garrafa', 'preco_de_custo' => 1.99, 'estoque' => 6),
        array('descricao' => 'Mochila','preco_de_custo' => 299.99, 'estoque' => 99)
    );

    // echo "<pre>";
    // print_r($produto);
    // echo "<pre>";

    // try{
    //     foreach($produtos as $produto){
    //         $sql = "INSERT INTO produto(descricao, preco_de_custo, estoque)
    //         VALUES('{$produto['descricao']}', {$produto['preco_de_custo']}, {$produto['estoque']})";
    //         $retorno = $conexao->exec($sql);  
    //         echo "<br>";
    //         echo "Foram adicionados {$retorno} com sucesso.<br>";
    //     }    
    // }catch(PDOException $e){
    //     echo "Erro ao tentar remover.<br>".$e->getMessage()."<br>";
    // }

    $sql = "SELECT * FROM produto";

    try{
        $retorno = $conexao->query($sql);
        $produtos = $retorno->fetchAll(PDO::FETCH_ASSOC);
        echo "<br>Mostrando as tabelas <br><br>";

        foreach($produtos as $produto){
            foreach($produto as $key => $value){
                echo "{$key}: {$value} <br>";
            }
            echo "<br>";
        }
    }catch(PDOException $e){
        echo "Erro ao tentar remover.<br>".$e->getMessage()."<br>";
    }
?>