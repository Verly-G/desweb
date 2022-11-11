<?php
    function calculadora(float $n1, float $n2, string $operacao):float{
        if($operacao === "+" ) return $n1 + $n2;
        elseif($operacao === "-") return $n1 - $n2;
        elseif($operacao === "*") return $n1 * $n2;
        elseif($operacao === "/") return $n1 / $n2;
    }
?>