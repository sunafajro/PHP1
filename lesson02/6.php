<?php

function power($val, $pow) {
  if ($pow > 1) {
    return $val * pow($val, $pow - 1);
  } else if ($pow == 0) {
  	return 1;
  } else {
    return $val;
  }
}

echo power(3, 2);
?>