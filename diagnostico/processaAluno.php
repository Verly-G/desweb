<?php
    require_once "alunoFunc.php";
    //Substitui o $_POST[] tradicional
    $aluno = file_get_contents('php://input');
    //
    $aluno = json_decode($aluno, true);
    
    $media=obterMedia($aluno["nota1"], $aluno["nota2"]);
    $grau = "";
    preencherGrau($media, $grau);
    $aluno["grau"]=$grau;
    $aluno["media"]=$media;

    //Devolvendo em JSON
    echo json_encode($aluno);

?>
