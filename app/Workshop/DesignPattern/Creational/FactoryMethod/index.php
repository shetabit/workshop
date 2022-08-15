<?php

use App\Workshop\DesignPattern\Creational\FactoryMethod\DevelopmentManager;
use App\Workshop\DesignPattern\Creational\FactoryMethod\MarketingManager;

$devManager = new DevelopmentManager();
echo $devManager->takeInterview() . '<br>'; // Output: Asking about design patterns

$marketingManager = new MarketingManager();
echo $marketingManager->takeInterview(); // Output: Asking about community building.
