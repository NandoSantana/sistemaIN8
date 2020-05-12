<?php

$siglaEstado = ['ES', 'MG', 'RJ', 'SP', 'MT'];
$nomeEstado  = ['Mato Grosso', 'São Paulo', 'Rio de Janeiro', 'Minas Gerais', 'Espírito Santo'];

$reverseEstado = array_reverse($siglaEstado);

for ($i=0; $i < count($reverseEstado); $i++) { 
	# code...
 // var_dump($reverseEstado);

	$novaForamatacao[$i] = array($reverseEstado[$i]=>$nomeEstado[$i]);
	
	//var_dump($novaForamatacao);	

	 $var .= $reverseEstado[$i]." - ".$nomeEstado[$i]."<br/>";

	while (list($key, $val) = each($novaForamatacao[$i])) {  
      echo "$key - $val<br/>";  
	} 
}

?>