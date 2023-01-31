<?php

namespace App\Workshop\DesignPattern\Behavioral\Strategy\Shop;

class ShoppingCart
{
    private CalculateTotalCostStrategy $strategy;

    public function __construct(CalculateTotalCostStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function calculateTotalCost(array $items)
    {
        return $this->strategy->calculate($items);
    }
}
