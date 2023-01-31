<?php

use App\Workshop\DesignPattern\Behavioral\Strategy\Shop\DiscountCodeStrategy;
use App\Workshop\DesignPattern\Behavioral\Strategy\Shop\ShippingCostStrategy;
use App\Workshop\DesignPattern\Behavioral\Strategy\Shop\ShoppingCart;

$items = array(10, 20, 30);

$shoppingCart = new ShoppingCart(new DiscountCodeStrategy());
echo $shoppingCart->calculateTotalCost($items);
// output: 50 (total cost of items - discount)

$shoppingCart = new ShoppingCart(new ShippingCostStrategy());
echo $shoppingCart->calculateTotalCost($items);
// output: 70 (total cost of items + shipping cost)
