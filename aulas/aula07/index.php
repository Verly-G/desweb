<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 7: Constantes, Operadores Lógicos, Operadores de Comparação e Operadores Ternário</title>
</head>
<body>
    
    <?php
        
        echo "Criando uma constante: <br/><br/>";

        // Constante: Uma Constante é um valor que pode ser armazenado sob um nome, 
        // de forma parecida com uma variável, porém com uma diferença fundamental: 
        // esse valor não pode ser alterado após a constante ser definida e atribuída

        define('PI', 3.1416); //Float

        define('TITULO', 'Comprimento da circunferência'); //string

        $raio = 3;
        $circunferencia = 2 * PI * $raio;

        echo TITULO . " : " . $circunferencia;
        echo "<br/><br/>";

        //Constantes:

        // É possiível ver todas as caracteristicas das constantes:

        // print_r(get_defined_constants());

        // Operadores de atribuição:

        $x = 10;

        echo "{$x} <br/><br/>";

        $x += 5; //Soma mais 5 a variável x.

        echo "{$x}<br/><br/>";

        $x *= 2; //Multiplica 2 * x.

        echo "{$x}<br/><br/>";

        $x /= 3; //Divide 3/x.

        echo "{$x}<br/><br/>";

        $x -= 5; //Subitrai ao valor de x.
        
        echo "{$x}<br/><br/>";
        
        $x %= 2; //Diz o resto da divisão
        
        echo "{$x}<br/><br/>";

        $s = 'ADM';
        $s .= ' S2 INFO'; //Concatena as variaveis.

        echo "{$s} <br/><br/>";

        $i = 1;

        $i ++;//Soma 1.

        echo "{$i} <br/><br/>";

        $i --;//Subtrai 1.

        echo "{$i}<br/><br/>";

        $t = 2;

        $t = $i++; //T recebe o valor de i.

        echo "{$t}<br/><br/>";

        $i = 5;

        $t = ++ $i; //i é incrementado antes de ser atribuido a t. Ambos passam a valer 6.

        echo "{$t} {$i}";

        $r = 2**3; //Ele faz a exponenciação, ou seja, ele deixa o 2³. 

        echo "<br/> <br/>{$r} <br/><br/>";

        //Operadores de comparação:

        if($r == $t) echo 'r e t são iguais.<br/><br/>';

        if($r != $t) echo 'r e t são diferentes.<br/><br/>';

        if($r > $t) echo 'r é maior que t.<br/><br/>';

        if($r < $t) echo 'r é menor que t.<br/><br/>';

        if($r >= $t) echo 'r maior ou igual a t.<br/><br/>';

        if($r <= $t) echo 'r é menor ou igual a t.<br/><br/>';

        if( $r === $t) echo 'r e t possuem valores e tipos iguais.<br/><br/>';

        if($r !== $t) echo 'r e t possuem valores e tipos diferentes.<br/><br/>';

        //Operador Lógico:

        //E: Verdadeiro se $a e $b são verdadeiros. and
        //OU: Verdadeiro se $a ou $b são verdadeiros. or
        //XOR: Verdadeiro se $a ou $b são verdadeiros. xor
        //NÃO: Verdadeiro se $a não é verdadeiro. !
        //E: Verdadeiro se $a e $b são verdadeiros. &&
        //OU: Verdadeiro se $a e $b são verdadeiros. ||

        //foo() nunca será chamada como estes operadores são short-circuit.

        function foo()
        { return true;}
        $a =(false && foo());
        $b =(false || foo());
        $c =(false and foo());
        $d =(false or foo());


        //"||" Tem maior precedência que "or"

        $e = false || true;
        $f = false or true;
        var_dump($e, $f);

        //"&&" tem maior precedência que "and"

        $g = true && false;
        $h = true and false;
        var_dump($g, $h); 

        //Operador Ternário: É utilizado para operações de atribuição com base em resultado de alguma
        //expreção boleana.

        $c = ($a > $b) ? 'Maior' : 'Menor ou igual';
        
        $sexo = 'M';

        $tratamento = ('M' == $sexo) ? 'Sr.' : 'Sra.';

        echo "<br/><br/>";

        var_dump($c, $tratamento);

        //Funções:

        function teste (){
            $z = 5;//Local a função.
            echo "Durante a execução da função: $z <br/>";
        }

        $z = 3;//Global.

        function test (){
            $z = 5;//Global
            echo "Durante a execução da função: $z <br/>";
            //Declarando variavel global.
            global $valor;
            $valor +=1;
            echo "<br/> Valor:{$valor}";
        }

        echo '<br/><br/>';test();'<br/><br/>';
        
        function testa (){
            $z = 5;//Global
            echo "Durante a execução da função: $z <br/>";
            //Declarando variavel global.
            $GLOBALS ['Na'] +=1;
            $GLOBALS['res'] +=1;
            echo "<br/> Valor:{}";
        }

        echo '<br/><br/>';test();'<br/><br/>';

        //Pode haver vários elseif no mesmo if. Duas formas de escrever: elseif e else if. 
        //Para usar ':' precisa do elseif junto.
    ?>
</body>
</html>