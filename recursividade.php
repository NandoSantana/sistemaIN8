<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ini_set('memory_limit', '512M');

function minimoDivisorRecursivo($value)
{
	$divisor1 = 2;
	$divisor2 = 3;
	$divisor3 = 10;

	$hanoi = array($divisor1, $divisor2, $divisor3);
	
	if($value / $hanoi[0] && $value / $hanoi[1] && $value / $hanoi[2] )
	{
	
		$valuesDiv1 = $value / $hanoi[0];
		$valuesDiv2 = $value / $hanoi[1];
		$valuesDiv3 = $value / $hanoi[2];

		return min((int)$valuesDiv1, (int)$valuesDiv2, (int)$valuesDiv3);

	}else{

		echo minimoDivisorRecursivo($value);
	}
	
}

echo minimoDivisorRecursivo(60);


