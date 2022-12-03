<?php

namespace App\Workshop\DesignPattern\Creational\AbstractFactory;

class Carpenter implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'I can only fit wooden doors';
    }
}
