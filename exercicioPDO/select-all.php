<?php

    require_once "conexao.php";

    $sql = "SELECT * FROM produto";

    try{
        $retorno = $conexao->query($sql);
        $produto = $retorno->fetchAll(PDO::FETCH_ASSOC);

        echo "FAZENDO COM MATRIZ ASSOCIATIVA: <br><br>";
        foreach($produto as $produto){
            foreach($produto as $key => $value){
                echo "{$key}: {$value} <br>";
            }
            echo "<br>";
        }


    }catch(PDOException $e){
        echo "Select não efetuado ".$e->getMessage()."<br>";
    }
    
    try{
        $retorno = $conexao->query($sql);
        $produtos = $retorno->fetchAll(PDO::FETCH_OBJ);
        // echo "<pre>";
        // var_dump($produtos);
        // echo "<pre>";
        echo "FAZENDO COM OBJETO:   <br><br>";
        for($i = 0; $i < count($produtos); $i++){
            echo "Id: {$produtos[$i]->id} <br>
            Descrição: {$produtos[$i]->descricao}<br>
            Preço: {$produtos[$i]->preco_de_custo}<br>
            Estoque: {$produtos[$i]->estoque} <br>";
            echo "<br>";
        }
    }catch(PDOException $e){
        echo "Erro ao tentar consultar.<br>".$e->getMessage()."<br>";
    }

?>