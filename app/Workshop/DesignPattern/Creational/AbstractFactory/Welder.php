<?php

namespace App\Workshop\DesignPattern\Creational\AbstractFactory;

class Welder implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'I can only fit iron doors';
    }
}
