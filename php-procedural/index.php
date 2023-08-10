<?php
	declare(strict_types=1);
	require_once('funcoes1.php');
	require_once('funcoes2.php');
	$produtos = [
		'1' => [
			'descricao' => 'Cerveja',
			'precoDeCusto' => 4
		],
		'2' => [
			'descricao' => 'Guaraná',
			'precoDeCusto' => 5
		]
	];
	$contas = [
		'1' =>[
			'cpf' => '123.456.789-10',
			'titular' => 'Rafael',
			'saldo' => 3000
		],
		'2' =>[
			'cpf' => '123.456.789-11',
			'titular' => 'Renata',
			'saldo' => 5000
		],
		'3' =>[
			'cpf' => '123.456.789-12',
			'titular' => 'Maria',
			'saldo' => 2500
		]
	];
	$precoDeVendaDaCerveja = obterPrecoDeVenda($produtos['1'],50);
	echo "O preço de venda do produto {$produtos['1']['descricao']} é $precoDeVendaDaCerveja<br><hr>";
	echo "A conta do Rafael tem saldo {$contas['1']['saldo']}<br><hr>";
	$contaDoRafaelAposSaque = sacar($contas['1'], 199);
	$contas['1'] = $contaDoRafaelAposSaque;
	echo "Após o saque: <br> A conta do Rafael tem saldo {$contas['1']['saldo']}<br><hr>";

	echo "A conta da Renata tem saldo {$contas['2']['saldo']}<br><hr>";
	saca($contas['2'], 199);
	echo "Após o saque: <br> A conta da Renata tem saldo {$contas['2']['saldo']}<br><hr>";
	deposita($contas['2'], 2000);
	echo "{$contas['2']['saldo']}<br><hr>";

	if(validaCpf($contas['1'])===true) echo "O cpf de {$contas['1']['titular']} é valido<br><hr>";
	else echo "O cpf de {$contas['1']['titular']} é inválido<br><hr>";

	if(validaCpf($contas['2'])===true) echo "O cpf de {$contas['2']['titular']} é valido<br><hr>";
	else echo "O cpf de {$contas['2']['titular']} é inválido<br><hr>";
?>