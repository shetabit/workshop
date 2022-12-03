<?php

namespace App\Workshop\DesignPattern\Creational\AbstractFactory;

interface DoorFactory
{
    public function makeDoor(): Door;
    public function makeFittingExpert(): DoorFittingExpert;
}
