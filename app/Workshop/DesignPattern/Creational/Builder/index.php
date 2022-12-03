<?php

use App\Workshop\DesignPattern\Creational\Builder\BurgerBuilder;

$burger = (new BurgerBuilder(14))
    ->addPepperoni()
    ->addLettuce()
    ->addTomato()
    ->build();
