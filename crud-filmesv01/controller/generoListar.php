<?php
    require_once('../model/conexao.php');
    //Montando uma resposta como matriz associativa com valores de sucesso.
    // OBS: Ela deve delvolver para o cliente (javascript) no formato de texto JSON
    $resposta["erro"] = false;
    $resposta["dados"] = null;
    $resposta["msgErro"] = '';
    $resposta["msgSucesso"] = "";
    try{
        // Escrevendo o código sql:
        $sql = "SELECT * FROM generos ORDER BY descricao";
        // prepare() utiliza declarações preparadas e fez uma consulta. Ela é otimizada pelo banco e pode ser executada N vezes o que muda são os argumentos, seu uso evita problemas com injeção de sql desde que usado corretamente.
        $stmt = $conexao->prepare($sql);
        // Depois executa:
        $stmt->execute();
        //Devolvendo os dados em linhas pelos dados de $respostas
        //O FECTH_ASSOC faz com que os dados deverão estar preparados de uma matriz associativa
        $resposta["dados"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Envia uma mensagem de sucesso:
        $resposta["msgSucesso"] = " Generos listados com sucesso!";
    }catch(PDOException $e){
        //Caso de erro, mostre uma mensagem falando qual é
        $resposta["erro"] = true;
        $resposta["msgErro"] = "Erro ao listar gêneros. ".$e->getMessage();
    }finally{
        //Mande a resposta para o cliente no formato de texto JSON
        //OBS: finally é executado de qualquer forma, mesmo que caia no catch. Isso é o tratamento de exceção
        echo json_encode($resposta);
    }

?>
