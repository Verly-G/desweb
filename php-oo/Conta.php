<?php

    class Conta{
        //características(atributos)
        public int $numero;
        public string $cpf;
        public string $titular;
        public float $saldo;

        public function saca(float $valor):void{
            $this->saldo -= $valor;
        }  
    }

?>