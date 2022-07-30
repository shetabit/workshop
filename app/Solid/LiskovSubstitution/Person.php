<?php

namespace App\Solid\LiskovSubstitution;

class Person
{
    public function squeezeDuck(): bool
    {
        return true;
    }

    public function throwDuckInTub(): bool
    {
        return true;
    }
}
