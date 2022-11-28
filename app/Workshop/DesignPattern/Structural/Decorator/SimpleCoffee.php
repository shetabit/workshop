<?php

namespace App\Workshop\DesignPattern\Structural\Decorator;

class SimpleCoffee implements Coffee
{

    public function getCost(): int
    {
        return 10;
    }

    public function getDescription(): string
    {
        return 'Simple coffee';
    }
}
