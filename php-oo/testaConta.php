<?php

    require_once('Conta.php');

    $conta1 = new Conta();

    $conta1->numero = 1;
    $conta1->cpf = "123.456.789-10";
    $conta1->titular = "Dhiovana";
    $conta1->saldo = 3000;

    $conta2 = new Conta();

    $conta2->numero = 2;
    $conta2->cpf = "123.456.789-11";
    $conta2->titular = "Kayllane";
    $conta2->saldo = 4000;

    $conta3 = new Conta();

    $conta3->numero = 3;
    $conta3->cpf = "123.456.789-12";
    $conta3->titular = "Marcolino";
    $conta3->saldo = 2500;

    
    echo "A conta de {$conta1->numero} de {$conta1->titular} possui um saldo de R\${$conta1->saldo}<br>";
    echo "A conta de {$conta2->numero} de {$conta2->titular} possui um saldo de R\${$conta2->saldo}<br>";
    echo "A conta de {$conta3->numero} de {$conta3->titular} possui um saldo de R\${$conta3->saldo}<br>";

    $conta2->saca(1000);
    echo "Após sacar 2000<br>";

    echo "A conta de {$conta2->numero} de {$conta2->titular} possui um saldo de R\${$conta2->saldo}<br>";
?>