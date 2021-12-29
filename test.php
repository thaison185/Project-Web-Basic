<?php

session_start();

$cart = json_decode($_COOKIE['cart']);

echo count($cart);