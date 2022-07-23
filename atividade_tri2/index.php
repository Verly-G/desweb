<?php
  $a = array("Maria" => "41,f", "Pedro" => "18,h", "Joao" => "58,h", "Joana" => "15,f");

  foreach ($a as $key => $value) {
    $nome = explode(",", $value);
      if ($nome[1] == "h") {
        echo "Nome: {$key} <br/> Idade: {$nome[0]}" ;
        echo "</br>";
      }
  };
?>

<?php
echo "<br/></br/></br/>";
  $a = array("Maria" => "41,f", "Pedro" => "18,h", "Joao" => "58,h", "Joana" => "15,f");
  $nomes = "Pedro,Fernando,Joaquim,Joana,Estefane";
  $nomes = explode(",", $nomes);
  foreach ($nomes as $value) {
    if (!array_key_exists($value, $a)) {
      echo $value;
      echo "</br>";
    }
  }

?>

<?php
  echo "<br/></br/></br/>";
  $chaves = ["nome", "idade", "conjuge", "filhos"];

  $valores = ["Marta", 23, "Fernando", "Huguinho, Zezinho, Luizinho"];

  $juntando = array_combine( $chaves, $valores);
  print_r($juntando);
?>

<?php
  echo "<br/></br/></br/>";
  $texto = "Nós não desistiremos nem fracassaremos. Nós iremos até o fim. Nós lutaremos na França, lutaremos nos mares e oceanos, nós lutaremos com confiança crescente e uma força também crescente ao nosso redor. Nós defenderemos nossa ilha, qualquer que seja o preço. Nós lutaremos nas praias, lutaremos em terra firme, lutaremos nos campos e nas ruas, lutaremos nas montanhas. Nós nunca nos renderemos!";
  $texto = strtolower($texto);

  echo "</br>";
  $contagem = preg_match_all('/\bque\b/i', $texto);
  echo $contagem;

?>
