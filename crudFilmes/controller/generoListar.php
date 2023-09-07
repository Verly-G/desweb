<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
    
    if($autenticado===true){
        try{
            $sql = "SELECT * FROM generos ORDER BY descricao";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            responder(false,"Generos listados com sucesso!",$stmt->fetchAll(PDO::FETCH_ASSOC));
        }catch(PDOException $e){
            responder(true,"Erro ao listar generos. ".$e->getMessage());
        }
    }
?>
