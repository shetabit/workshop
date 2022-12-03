<?php

use App\Workshop\DesignPattern\Creational\Singleton\President;

$president1 = President::getInstance();
$president2 = President::getInstance();

var_dump($president1 === $president2); // true
