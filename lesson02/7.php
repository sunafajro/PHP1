<?php

function getCurTime($h, $m) {

	$arr1 = [1,21];
	$arr2 = [2,3,4,22,23];

	$str = '';
	if(in_array($h, $arr1)) {
		$str .= $h . ' час ';
	} else if(in_array($h, $arr2)) {
		$str .= $h . ' часа ';
	} else {
		$str .= $h . ' часов ';
	}

    if(in_array($m, $arr1)) {
		$str .= $m . ' минута';
	} else if(in_array($m, $arr2)) {
		$str .= $m . ' минуты';
	} else {
		$str .= $m . ' минут';
	}


	return $str;
}

echo getCurTime(15,20); 
?>