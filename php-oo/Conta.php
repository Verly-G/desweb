<?php
    class Conta{

        private int $numero=0;
        private string $titular='';
        private string $cpf='';
        private float $saldo=0;

        public function obtemNumero():int{
            return $this->numero;
        }
        public function atribuiNumero(int $numero):void{
            if($numero<=0)
                die("Número inválido. A aplicação será encerrada.");
            $this->numero = $numero;
        }

        public function obtemTitular():string{
            return $this->titular;
        }
        public function atribuiTitular(string $titular):void{
            if(strlen($titular)<5)
                die("O titular precisa ter ao menos 5 caracteres. A aplicação será encerrada.");
            $this->titular = $titular;
        }

        public function obtemCpf():string{
            return $this->cpf;
        }
        public function atribuiCpf(string $cpf):void{
            if($this->validaCpf($cpf)==false)
                die("CPF inválido. A aplicação será encerrada.");
            $this->cpf = $cpf;
        }
        private function validaCpf(string $cpf):bool{
            if(strlen($cpf)==14 && strpos($cpf,'.')===3 && strpos($cpf,'.',4)===7 && strpos($cpf,'-')===11)
                return true;
            return false;
        }
        public function obtemSaldo():float{
            return $this->saldo;
        }
        public function atribuiSaldo(float $saldo):void{
            if($saldo <= 0){
                echo "Coloque um saldo maior que zero.";
                return;
            }
            $this->saldo = $saldo;
        }

        public function saca(int $valorDoSaque):void{
            if($valorDoSaque <=0 || $this->saldo < $valorDoSaque){
                echo "O valor do saque é menor que zero ou ultrapassa o saldo em conta. Com isso, não foi possível efetua-lo.";
                return;
            }
            $this->saldo -= $valorDoSaque; 
        }
        public function deposita(int $valorDoDeposito):void{
            if($valorDoDeposito<=0){
                echo "O valor do depósito deve ser maior que zero.";
                return;
            }
            $this->saldo += $valorDoDeposito;
        }
        public function tranferePara(Conta $destinatario, int $valorDaTranferencia):void{
            $this->saca($valorDaTranferencia);
            $destinatario->deposita($valorDaTranferencia);
        }
    }
?>