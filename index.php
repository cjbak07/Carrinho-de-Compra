<?php

require 'Products.php';
require 'Cart.php';
require 'Discount.php';

$cart = new Cart($products);

#CASO DE USO 1: ADD PRODUTO VÁLIDO NO CARRINHO
echo $cart -> addItem(1,2) . "<br>";


#CASO DE USO 2: ADD PRODUTO SEM ESTOQUE
echo $cart -> addItem(3, 10) . "<br>";

#CASO DE USO 3: REMOVER PRODUTO
echo $cart -> removeItem(1) . "<br>"; 

#CASO DE USO 4: APLICAÇÃO DE CUPOM DE DESCONTO;
$cart -> addItem(2,1);
$total = $cart -> getTotal();
echo "Total sem desconto: R$ $total" . "<br>";
echo "Total com desconto: R$ " . applyDiscount($total, "DISCOUNT10") . "<br>";
