<?php

namespace App\Workshop\DesignPattern\Behavioral\State;

class UpperCase implements WritingState
{

    public function write(string $words)
    {
        echo strtoupper($words);
    }
}
