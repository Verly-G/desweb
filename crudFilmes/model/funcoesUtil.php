<?php
    function getConexao(){
        $pdo=null;
        try{
            $dsn="mysql:host=localhost;dbname=cinedesweb2;charset=utf8";
            $pdo = new PDO($dsn,"root","",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            //$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            responder(true,"Erro ao conectar com o BD. {$e->getMessage()}");
        }
    }

    function responder(bool $erro, string $msg, array $dados=null){
        header("Content-Type:application/json;charset=utf-8");
        die(json_encode(["erro"=>$erro, "msg"=>$msg,"dados"=>$dados])); 
    }
?>