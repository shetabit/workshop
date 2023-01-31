<?php

namespace App\Workshop\DesignPattern\Behavioral\Strategy\Shop;

interface CalculateTotalCostStrategy
{
    public function calculate(array $items);
}
