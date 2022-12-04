<?php

namespace App\Workshop\DesignPattern\Behavioral\State;

class LowerCase implements WritingState
{

    public function write(string $words)
    {
        echo strtolower($words);
    }
}
