<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
    if($autenticado===true){
        try{
            $sql = "SELECT f.*,g.descricao as genero_descricao FROM filmes_assistidos f 
            JOIN generos g ON(f.genero_id=g.id) ORDER BY titulo";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            responder(false,"Filmes listados com sucesso!",$stmt->fetchAll(PDO::FETCH_ASSOC));
        }catch(PDOException $e){
            responder(true,"Erro ao listar filmes. ".$e->getMessage());
        }
    }
?>