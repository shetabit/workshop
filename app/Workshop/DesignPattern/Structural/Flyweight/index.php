<?php

use App\Workshop\DesignPattern\Structural\Flyweight\TeaMaker;
use App\Workshop\DesignPattern\Structural\Flyweight\TeaShop;

$teaMaker = new TeaMaker();
$shop = new TeaShop($teaMaker);

$shop->takeOrder('less sugar', 1);
$shop->takeOrder('more milk', 2);
$shop->takeOrder('without sugar', 5);

$shop->serve();
// Serving tea to table# 1
// Serving tea to table# 2
// Serving tea to table# 5
