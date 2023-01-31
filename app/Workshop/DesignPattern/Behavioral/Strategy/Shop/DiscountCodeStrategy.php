<?php

namespace App\Workshop\DesignPattern\Behavioral\Strategy\Shop;

class DiscountCodeStrategy implements CalculateTotalCostStrategy
{

    public function calculate(array $items)
    {
        $discount = 10;
        // logic to apply discount code
        return array_sum($items) - $discount;
    }
}
