<?php

require 'Cart.php';

$cart = new Cart();

echo $cart->addItem(1,2) . "<br>";

echo $cart->addItem(3, 10) . "<br>";

echo $cart->removeItem(1) . "<br>"; 

$cart->addItem(2,1);
$total = $cart->getTotal();
echo "Total sem desconto: R$ $total" . "<br>";
echo "Total com desconto: R$ " . $cart->applyDiscount($total, "DISCOUNT10") . "<br>";
