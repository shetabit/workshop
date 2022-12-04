<?php

namespace App\Workshop\DesignPattern\Behavioral\Visitor;

// Visitee
interface Animal
{
    public function accept(AnimalOperation $operation);
}
