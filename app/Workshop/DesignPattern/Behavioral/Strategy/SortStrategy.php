<?php

namespace App\Workshop\DesignPattern\Behavioral\Strategy;

interface SortStrategy
{
    public function sort(array $dataset): array;
}
