<?php
$a = -1;
$b = -2;

/*  если обе переменные положительные */
if($a >= 0 && $b >= 0) {
	echo $a - $b;
}
/* если обе переменные отрицательные */
else if($a < 0 && $b < 0) {
	echo $a * $b;
} /* если переменные с разным знаком */
else {
	echo $a + $b;
}