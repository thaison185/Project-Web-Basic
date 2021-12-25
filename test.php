<?php 

$cart = json_decode($_COOKIE['cart']);

// echo(json_encode($cart));
// echo(gettype($cart));
array_splice($cart, 0, 1);
echo(json_encode($cart));
// echo(gettype($cart));