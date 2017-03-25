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
	if($y == 0) {
		return 'деление на ноль!';
	}
	return $x / $y;
}

?>

<p>4 + 7 = <?= actSum(4,7) ?></p>
<p>5 - 2 = <?= actSub(5,2) ?></p>
<p>9 * 3 = <?= actMul(9,3) ?></p>
<p>7 / 5 = <?= actDiv(7,5) ?></p>