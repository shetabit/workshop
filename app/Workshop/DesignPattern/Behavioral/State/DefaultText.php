<?php

namespace App\Workshop\DesignPattern\Behavioral\State;

class DefaultText implements WritingState
{

    public function write(string $words)
    {
        echo $words;
    }
}
