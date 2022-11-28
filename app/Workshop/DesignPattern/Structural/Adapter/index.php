<?php

use App\Workshop\DesignPattern\Structural\Adapter\Hunter;
use App\Workshop\DesignPattern\Structural\Adapter\WildDog;
use App\Workshop\DesignPattern\Structural\Adapter\WildDogAdapter;

$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter); //WildDog is barking...
