<?php

    require_once('Conta.php');

    $conta1 = new Conta();

    $conta1->atribuiNumero(1);
    $conta1->atribuiCpf("123.456.789-10");
    $conta1->atribuiTitular("Dhiovana");
    $conta1->atribuiSaldo(3000);

    $conta2 = new Conta();

    $conta2->atribuiNumero(2);
    $conta2->atribuiCpf("123.456.789-11");
    $conta2->atribuiTitular("Kayllane");
    $conta2->atribuiSaldo(4000);

    
    echo "A conta de {$conta1->obtemNumero()} de {$conta1->obtemTitular()} possui um saldo de R\${$conta1->obtemSaldo()}<br>";
    echo "A conta de {$conta2->obtemNumero()} de {$conta2->obtemTitular()} possui um saldo de R\${$conta2->obtemSaldo()}<br>";

    $conta2->saca(2000);
    echo "Após sacar 2000<br>";

    echo "A conta de {$conta2->obtemNumero()} de {$conta2->obtemTitular()} possui um saldo de R\${$conta2->obtemSaldo()}<br>";

    $conta2->tranferePara($conta1, 1000);
    echo "Após a tranferência de 1000 da Kayllane para Dhiovana.<br>";
    echo "A conta de {$conta2->obtemNumero()} de {$conta2->obtemTitular()} possui um saldo de R\${$conta2->obtemSaldo()}<br>";
    echo "A conta de {$conta1->obtemNumero()} de {$conta1->obtemTitular()} possui um saldo de R\${$conta1->obtemSaldo()}<br>";

?>