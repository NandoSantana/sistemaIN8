<?php
function sincronizaMultiplos($multiplos5, $multiplos3){

	$loop3 = count($multiplos3);
	$loop5 = count($multiplos5);
	for ($contador = 0 ; $contador < $loop5; $contador++) {
	
		for ($i=0; $i < $loop3; $i++) { 

			$multiplicador1 = $multiplos3[$contador];
		
		}
		
		echo "<br/>";
	
		for ($j=0; $j < $loop5; $j++) { 

			$multiplicador2 = $multiplos5[$contador];
		
		}
	
		if($multiplicador1 * $multiplicador2 <= 1000 ) {
			echo $resultado = $multiplicador1 * $multiplicador2;
		}

	} 

}

function calculaMultiplos()
{
	$multiplos3 = array(3, 6, 9,  12, 15, 18, 21, 24, 27, 30, 33);
	$multiplos5 = array(5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55);

	sincronizaMultiplos($multiplos5, $multiplos3);

}
calculaMultiplos();