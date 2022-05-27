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

// Criação de váriaveis

    $idade = 16;
    $altura = 10;

    $nome = 'Gabriel';

?>

<br>


<?php

    // Como escrever um texto:
    echo "Escrevendo um texto.";

    // Criação de variáveis:
    $var = 10;

    // utilizando variável em um echo. Dois tipos diferentes.
    echo "Idade: {$idade} Altura: {$altura} Nome: {$nome} <br/><br/>";
    
    echo " Idade: " .$idade. " Altura: " .$altura. " Nome: " .$nome. "<br/>";
    
    // para pular linha, usa o br.
    echo "<br/>";


    //settype é usado para converter uma variável num tipo especifico como:
    // int, integer, bool, boolean, string, binary, array e object.
    settype($string, 'int');

    settype($string, 'integer');

    settype($string, 'bool');

    settype($string, 'boolean');

    settype($string, 'string');

    // Outro jeito de converter uma determinada variável.
    $idad = (bool) $idade;

    $idad = (int) $idade;

    $idad = (integer) $idade;

    $idad = (boolean) $idade;

    $idad = (string) $idade;

    $idad = (binary) $idade;

    $idad = (array) $idade;

    $idad = (object) $idade;
    

    // Como criar uma função: 
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

    // A função var_dump exibi a estrutura de uma variável.
    var_dump($altura);

    // isset se a variável tiver algum valor.
    if (isset ($altura)){
        echo " <br/><br/> Preenchido  <br/><br/>";
    }else {
        echo " <br/><br/> Não preenchido  <br/><br/>";
    }
    
    // E empty se não estiver nada.
    if(empty($altura)){
        echo "Não tem nada.  <br/><br/>";
    }else echo "Tem algo escrito.  <br/><br/>";

?>


</body>
</html>
