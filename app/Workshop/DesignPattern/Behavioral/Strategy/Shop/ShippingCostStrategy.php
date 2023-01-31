<?php

namespace App\Workshop\DesignPattern\Behavioral\Strategy\Shop;

class ShippingCostStrategy implements CalculateTotalCostStrategy
{

    public function calculate(array $items)
    {
        $shippingCost = 10;
        // logic to calculate shipping costs
        return array_sum($items) + $shippingCost;
    }
}
