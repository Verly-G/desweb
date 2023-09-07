<?php
    require_once("../model/autenticar.php");
    require_once("../model/funcoesUtil.php");
    $conexao = getConexao();
    if($autenticado===true){
        try{
            $sql = "SELECT id,nome FROM usuarios ORDER BY nome";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            responder(false,"Usuários listados com sucesso!",$stmt->fetchAll(PDO::FETCH_ASSOC));
        }catch(PDOException $e){
            responder(true,"Erro ao listar usuários. ".$e->getMessage());
        }
    }
?>