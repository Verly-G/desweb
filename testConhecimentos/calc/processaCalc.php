<?php
    require_once "operacao.php";
    // Substitui o $POST[]
    $valor = file_get_contents('php://input');

    // Tranfosrmando em JSON
    $valor = json_decode($valor, true);

    $calc = calculadora($valor["number1"], $valor["number2"], $valor["operacaoCalc"]);
    $valor["resultado"] = $calc;

    // Devolvendo em JSON
    echo json_encode($valor);
?>