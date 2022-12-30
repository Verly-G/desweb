<?php
//  O que está acontecendo?
//  Estou dizendo o local de onde os dados virão. Nesse caso da própria máquina
    $dsn = "mysql:
            host=localhost;
            dbname=cinedesweb";
    $user = "root";
    $pass = "";
    try{
        // Passando os dados para uma conexão PDO
        $conexao = new PDO($dsn, $user, $pass);
        // PDO lançará uma PDOException e definirá suas propriedades para refletir o código de erro e as informações do erro
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // Caso de algum erro, execute o catch
    catch(PDOException $e){
        // Como caiu no catch, ou seja, deu erro. Coloque o erro como verdadeiro
        $resposta["erro"] =true;
        // Em seguida, mande a mensagem de erro.
        $resposta["msgErro"] = "Erro ao conectar com o banco de dados.".$e->getMessage();
        // Transformando '$resposta' em um objeto JSON em forma de texto
        // Mandando ao cliente
        echo json_encode($resposta);
        exit();
    }
?>
