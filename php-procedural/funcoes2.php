<?php
	//3-saca (por referência)
	function saca(array &$conta, float $valor):void{
		$conta['saldo'] -= $valor;
	}
	//5-validarCpf recebe um cpf
	function validarCpf(string $cpf) :bool{
		if(strlen($cpf)===14) return true;
		return false;
	}
	//aumentaPrecoDeCusto (por referência)

?>