<?php
    declare(strict_types=1);
    class Conta{

        private int $numero;
        private string $titular;
        private string $cpf;
        private float $saldo;

        //Método construtor
        public function __construct(int $numero, string $titular, string $cpf){
            $this->setNumero($numero);
            $this->setCpf($cpf);
            $this->setTitular($titular);
            $this->saldo = 0;
            // echo "Estamos criando/instanciando um objeto da classe Conta em memória...<br>";
        }

        public function getNumero():int{
            return $this->numero;
        }
        private function setNumero(int $numero):void{
            if($numero<=0)
                die("Número inválido. A aplicação será encerrada.");
            $this->numero = $numero;
        }

        public function getTitular():string{
            return $this->titular;
        }
        public function setTitular(string $titular):void{
            if(strlen($titular)<5)
                die("O titular precisa ter ao menos 5 caracteres. A aplicação será encerrada.");
            $this->titular = $titular;
        }

        public function getCpf():string{
            return $this->cpf;
        }
        private function setCpf(string $cpf):void{
            if($this->validaCpf($cpf)==false)
                die("CPF inválido. A aplicação será encerrada.");
            $this->cpf = $cpf;
        }
        private function validaCpf(string $cpf):bool{
            if(strlen($cpf)==14 && strpos($cpf,'.')===3 && strpos($cpf,'.',4)===7 && strpos($cpf,'-')===11)
                return true;
            else{
                die("CPF inválido. A aplicação será encerrada.");
            }
        }
        public function getSaldo():float{
            return $this->saldo;
        }

        public function saca(int $valorDoSaque):bool{
            if($valorDoSaque <=0 || $this->saldo < $valorDoSaque)
                return false;
            else{
                $this->saldo -= $valorDoSaque; 
                return true;
            }
        }
        public function deposita(int $valorDoDeposito):bool{
            if($valorDoDeposito<=0)
                return false;
            else{
                $this->saldo += $valorDoDeposito;
                return true;
            }
        }
        public function tranferePara(Conta $destinatario, int $valorDaTranferencia):bool{
            if($this->saca($valorDaTranferencia)===true)
                return $destinatario->deposita($valorDaTranferencia);
            else
                return false;
        }
    }
?>