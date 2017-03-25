<?php 

function actSum($x,$y) {
	return $x + $y;
}

function actSub($x,$y) {
	return $x - $y;
}

function actMul($x,$y) {
	return $x * $y;
}

function actDiv($x,$y) {
	return $x / $y;
}

function mathOperation($arg1, $arg2, $operation) {
	switch($operation) {
		case '+': return actSum($arg1, $arg2);
		case '-': return actSub($arg1, $arg2);
		case '*': return actMul($arg1, $arg2);
		case '/': return actDiv($arg1, $arg2);
	}
}

echo mathOperation(2, 5, '/');