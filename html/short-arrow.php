<?php
$numbers = [ 1, M_PI, 42 ];

$calcFunc = fn($x) => pow($x, 2) * M_PI;
$newNumbers = array_map( $calcFunc, $numbers );

echo array_sum( $newNumbers );