<?php

use App\Workshop\DesignPattern\Structural\Decorator\MilkCoffee;
use App\Workshop\DesignPattern\Structural\Decorator\SimpleCoffee;
use App\Workshop\DesignPattern\Structural\Decorator\VanillaCoffee;
use App\Workshop\DesignPattern\Structural\Decorator\WhipCoffee;

$someCoffee = new SimpleCoffee();
echo $someCoffee->getCost(); // 10
echo $someCoffee->getDescription(); // Simple Coffee

$someCoffee = new MilkCoffee($someCoffee);
echo $someCoffee->getCost(); // 12
echo $someCoffee->getDescription(); // Simple Coffee, milk

$someCoffee = new WhipCoffee($someCoffee);
echo $someCoffee->getCost(); // 17
echo $someCoffee->getDescription(); // Simple Coffee, milk, whip

$someCoffee = new VanillaCoffee($someCoffee);
echo $someCoffee->getCost(); // 20
echo $someCoffee->getDescription(); // Simple Coffee, milk, whip, vanilla
