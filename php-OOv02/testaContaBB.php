<?php
    require_once('Conta.php');
    $conta1 = new Conta(1, "Dhiovana", "123.456.789-10");

    if($conta1->deposita(3000)===false)
        echo "Valor inválido para depósito.<br>";
    else
        echo "Depósito efetuado com sucesso!<br>";

    if($conta1->saca(2000)===false)
        echo "Saque não efetuado. Ssaldo insuficiente.<br>";
    else 
        echo "Saque efetuado com sucesso!<br>";
    
    echo "A conta de {$conta1->getNumero()} de {$conta1->getTitular()} com cpf igual a {$conta1->getCpf()} possui um saldo de R\${$conta1->getSaldo()}<br>";

    $conta2 = new Conta(2, "Kayllane", "123.456.789-11");
    echo "Ao tentar transferir R\$1000 de Dhiovana para Kayllane...<br>";
    if($conta1->tranferePara($conta2,1000)===true)
        echo "Transferência concluída com sucesso!<br>";
    else
        echo "Não foi possível completar a transação. Procure seu gerente.<br>";
    
    echo "A conta de {$conta1->getNumero()} de {$conta1->getTitular()} com cpf igual a {$conta1->getCpf()} possui um saldo de R\${$conta1->getSaldo()}<br>";
    echo "A conta de {$conta2->getNumero()} de {$conta2->getTitular()} com cpf igual a {$conta2->getCpf()} possui um saldo de R\${$conta2->getSaldo()}<br>";
?>