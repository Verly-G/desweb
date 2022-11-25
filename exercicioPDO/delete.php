<?php

    require_once "conexao.php";

    $sql = "DELETE FROM produto WHERE estoque >= 90";

    try{
        $retorno = $conexao->exec($sql);
        echo "Produto deletado com sucesso";
    }catch(PDOException $e){
        echo "Não conseguiu deletar".$e->getMessage()."<br>";
    }

?>