<?php

namespace App\Workshop\DesignPattern\Behavioral\ChainOfResponsibility;

class Bank extends Account
{
    protected $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}
