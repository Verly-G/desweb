<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa 1</title>
</head>
<body>

<?php


    // Resumo das aulas

    // 1:Como escrever um texto:
    echo "Escrevendo um texto. <br/><br/>";

    //2: Criação de variáveis:
    $idade = 16;
    $altura = 1.76;
    $nome = 'Gabriel';

    //3: Como chamar uma variável.
    echo "Idade: {$idade} Altura: {$altura} Nome: {$nome} <br/><br/>";
    
    // Outra forma de chamar uma variável.
    echo " Idade: " .$idade. " Altura: " .$altura. " Nome: " .$nome. "<br/>";
    
    //4: Como pular linha.
    echo "<br/>";


    //4: Settype é usado para converter uma variável num tipo especifico como:
    // int, integer, bool, boolean, string, binary, array e object.

    echo "Mudando o tipo da variável.<br/><br/>";

    $sett = '11';

    settype($sett, 'string');

    echo "{$sett} <br/>";

    settype($sett, 'int');

    echo "{$sett} <br/>";

    settype($sett, 'integer');

    echo "{$sett} <br/>";

    settype($sett, 'bool');

    echo "{$sett} <br/>";

    settype($sett, 'boolean');

    echo "{$sett} <br/>";

    // Outro jeito de converter uma determinada variável.

    echo "Outro jeito de converter o tip da variável. <br/><br/>";

    $idad = (bool) $idade;

    echo "<br/> {$idad} <br/>";

    $idad = (int) $idade;
    
    echo "{$idad} <br/>";

    $idad = (integer) $idade;

    echo "{$idad} <br/>";

    $idad = (boolean) $idade;

    echo "{$idad} <br/>";

    $idad = (string) $idade;

    echo "{$idad} <br/>";

    $idad = (binary) $idade;

    echo "{$idad} <br/><br/>";


    // Como criar uma função:
    // Como foi ensinado na aula, a função is_ fala se uma determinada variável é 
    // um inteiro ou não por exemplo. 

    echo "Verifica o tipo da variável. <br/><br/>";

    if(is_int ($altura)){
        echo "Verdade <br/><br/>";
    }else{
        echo "Falso <br/><br/>";
    }

    if(is_float ($altura)){
        echo "Verdade <br/><br/>";
    }else{
        echo "Falso <br/><br/>";
    }

    if(is_integer ($altura)){
        echo "Verdade <br/><br/>";
    }else{
        echo "Falso <br/><br/>";
    }

    if(is_bool ($altura)){
        echo "Verdade <br/><br/>";
    }else{
        echo "Falso <br/><br/>";
    }

    if(is_object ($altura)){
        echo "Verdade <br/><br/>";
    }else{
        echo "Falso <br/><br/>";
    }

    // A função var_dump exibi a estrutura de uma variável, quantas caractéris, qual tipo...
    
    echo "Mostra a estrutura da variável. <br/> <br/>";
    
    var_dump($altura);

    // isset verifica se a variável tiver algum valor.

    echo "<br/><br/> Verifica se a variável tem algum valor";

    if (isset ($altura)){
        echo " <br/><br/> A variável tem algum valor.  <br/><br/>";
    }else {
        echo " <br/><br/> A variável não tem nenhum valor.  <br/><br/>";
    }
    
    // E empty verifica se não estiver nada.

    echo "Verifica se a variável não tem valor.<br/><br/>";

    if(empty($altura)){
        echo "A variável não tem valor.  <br/><br/>";
    }else echo "A variável não tem nada escrito.  <br/><br/>";

?>


</body>
</html>
