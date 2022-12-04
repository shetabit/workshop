<?php

namespace App\Workshop\DesignPattern\Behavioral\Strategy;

class QuickSortStrategy implements SortStrategy
{

    public function sort(array $dataset): array
    {
        echo "Sorting using quick sort";

        // Do sorting
        return $dataset;
    }
}
