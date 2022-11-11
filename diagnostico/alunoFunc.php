<?php
   function obterMedia(float $n1, float $n2):float{
    return (($n1+$n2) /2);
   }

   function preencherGrau(float $med, string &$g):void{
    if($med >9) 
        $g="A";
    elseif($med >= 7)
        $g="B";
    elseif($med >=4)
        $g="C";
    elseif($med >=2)
        $g="D";
    else
        $g = "E";
   }
?>