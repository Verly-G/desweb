<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    #passagem por referência (declaração da função)
    function digaOi(){
        echo "Oi <br/>";
        echo "<br/>";
    }

    #passagem por referência (declaração da função)
    function soma($a, $b){
        return $a + $b;
    }

    #chamada das funções
    digaOi();
    $x=5;
    $y=7;
    $resultado = soma($x,$y);
    echo"A soma de $x e $y é $resultado<br/>";
    echo "<br/>";

    #passagem por referência (declaração da função)
    function incrementar(&$num){
        return $num++;
    }
    
    #chamada das funções
    $x = 5;
    incrementar($x);
    echo 'A variável $x vale' .$x. '<br/>';
    echo "<br/>";

    #passagem por referência (declaração da função)
    function soma2(&$a, &$b){
        $a += 3;
        $b *= 4;
        return $a + $b;
    }

    #chamada das funções
    $x = 5;
    $y = 6;

    $result = soma($x, $y);
    echo '$x <br/>';
    echo "<br/>";

    echo '$y <br/>';
    echo "<br/>";

    echo '$result = ' .$result. '<br/>';
    echo "<br/>";

    $result = soma2($x, $y);
    echo '$x = ' .$x. '<br/>';
    echo "<br/>";

    echo '$y = '.$y. '<br/>';
    echo "<br/>";

    echo '$result = ' .$result. '<br/>';
    echo "<br/>";

    #Criando uma função com valor pré-definido
    function valordefinido($valor = 7){
        echo $valor .'<br/>';
    }
    
    echo "<br/>";

    #chamando a função
    valordefinido();

    echo "<br/>";

    #trocando valor e chamando a função
    valordefinido(6);


    #Outro exemplo de valor definido
    function valordefinido2($cor = "azul", $cor2 = "branca"){
        echo "A cor um é $cor e a cor dois é $cor2";
    }

    echo "<br/>";

    #chamando a função
    valordefinido2();

    echo "<br/>";
    echo "<br/>";

    #trocando valor da função e chamando ela
    valordefinido2("vermelha", "verde");
    echo "<br/>";
    echo "<br/>";

    #Fazendo um array
    function argumentos(){
        $argumentos = func_get_args();
        var_dump($argumentos);
        echo"<br/>";
    }

    #Colocando conteúdo nos array
    argumentos( "Olá" );
    argumentos( "Gabriel" );
    argumentos( 6, 9, 8, 0);

    function soma_v2($a, $b){
        $result = 0;
        $argumentos = func_get_args();
        for($i=0; $i<func_get_args();$i++){
            if(is_numeric(($argumentos[$i]))){
                $result += $argumentos[$i];
            }
        }
        return $result;
    }

    #Teste

    $x = 20;
    $y = 10;

    echo "<br/>";
    
    echo (soma($x, $y ));

    echo "<br/>";
    echo "<br/>";

    #Declaração de um array
    $meuarray = array(
        'nome' => 'Gabriel',
        'idade' => 20,
        'doce' => 'Chocolate',
        11 => 500,
        'time' => 'Flamengo'
    );

    #Chamando array
    echo 'Nome: ' .$meuarray['nome'].'<br/><br/>';
    echo 'Idade: ' .$meuarray['idade'].'<br/><br/>';
    echo 'Doce: '.$meuarray['doce'].'<br/><br/>';
    echo 'Número: ' .$meuarray[11].'<br/><br/>';
    echo 'Time: ' .$meuarray['time'].'<br/><br/>';

    #Se a chave não for especificada, é feita uma numeração automática.
    
    $meuarray2 = array(100, 200, 300);

    #Criando variáveis e relacionando elas ao array
    $a = $meuarray2[0]; //100
    $b = $meuarray2[1]; //200
    $c = $meuarray2[2]; //300

    #Chamando os arrays
    echo "Valor A = $a <br/> Valor B = $b <br/> Valor C = $c <br/>";

    #Se eu definir a primeira chave, as outras serão geradas de forma automática
    $trimestre = array(
        1 => 'Janeiro',
        'Fevereiro',
        'Março',
    );

    #Chamando o array
    echo '<br/>Primeiro mês:'.$trimestre [1]. '<br/>';
    echo 'Segundo mês:'.$trimestre [2]. '<br/>';
    echo 'Terceiro mês:'.$trimestre [3]. '<br/>';

    #Posso apenas usar o array

    $exemplo[3] = 100;
    $exemplo[4] = 200;
    $exemplo[5] = 300;

    #Chamando eles
    echo '<br/> Número:' .$exemplo[3]. '<br/>';
    echo 'Número:' .$exemplo[4]. '<br/>';
    echo 'Número:' .$exemplo[5]. '<br/>';

    #Para remover um elemento array, basta usar a função unset passando a chave do elemento desejado.

    //Chamando array completo
    echo"<br/>";
    var_dump($meuarray);
    echo"<br/>";

    unset($meuarray[11]);//Remove o elemento da chave 11

    #Chamando depois da remoção
    echo"<br/>";
    var_dump($meuarray);
    echo"<br/>";

    // #Removendo todo array
    // unset($meuarray);

    // #Chamando array depois da remoção
    // echo"<br/>";
    // var_dump($meuarray);
    // echo"<br/>";

    #Duas formas de chamar o array

    echo"<br/>";
    var_dump($meuarray);//Irá mostrar o tipo e tudo que tem no array
    echo"<br/>";

    print_r($meuarray);//Irá mostrar os conteúdos
    echo"<br/>";

    #Usando o foreach para percorrer todo o array imprimindo apenas seus elementos

    foreach($meuarray as $coisa){
        echo "<br/> Os array tem $coisa <br/>";
    }

    #A função sort ordena os elementos do array em ordem crescente
    sort($meuarray);

    echo"</br> $meuarray <br/>";

    #A função in_array verifica se o elemento está no array
    echo in_array('name', $meuarray);
    echo '</br>';

    #A função array_push inseri novos elementos no array
    array_push($meuarray, 'Letra G');
    print_r($meuarray);
    echo '</br>';

    #A função array_values indexa os valores numericos do array

    echo '</br>';
    print_r(array_values($meuarray));
    echo '</br>';

    
    ?>
</body>
</html>