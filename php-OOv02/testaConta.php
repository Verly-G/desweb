<?php

    require_once('Conta.php');

    $conta1 = new Conta(1, "Dhiovana", "123.456.789-10");
    $conta1->deposita(3000);

    $conta2 = new Conta(2, "Kayllane", "123.456.789-11");
    $conta2->deposita(4000);

    
    echo "A conta de {$conta1->getNumero()} de {$conta1->getTitular()} com cpf igual a {$conta1->getCpf()} possui um saldo de R\${$conta1->getSaldo()}<br>";
    echo "A conta de {$conta2->getNumero()} de {$conta2->getTitular()} possui um saldo de R\${$conta2->getSaldo()}<br>";

    $conta2->saca(2000);
    echo "Após sacar 2000<br>";

    echo "A conta de {$conta2->getNumero()} de {$conta2->getTitular()} com cpf igual a {$conta2->getCpf()} possui um saldo de R\${$conta2->getSaldo()}<br>";

    $conta2->tranferePara($conta1, 1000);
    echo "Após a tranferência de 1000 da Kayllane para Dhiovana.<br>";
    echo "A conta de {$conta2->getNumero()} de {$conta2->getTitular()} com cpf igual a {$conta2->getCpf()} possui um saldo de R\${$conta2->getSaldo()}<br>";
    echo "A conta de {$conta1->getNumero()} de {$conta1->getTitular()} com cpf igual a {$conta1->getCpf()} possui um saldo de R\${$conta1->getSaldo()}<br>";

    // $conta3 = new Conta();
    // echo "A conta {$conta3->getNumero()} de {$conta3->getTitular()} com cpf igual a {$conta3->getCpf()} possui um saldo de R\${$conta3->getSaldo()}<br>";
?>