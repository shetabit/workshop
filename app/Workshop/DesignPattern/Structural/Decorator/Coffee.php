<?php

namespace App\Workshop\DesignPattern\Structural\Decorator;

interface Coffee
{
    public function getCost(): int;
    public function getDescription(): string;
}
