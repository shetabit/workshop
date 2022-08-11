<?php

namespace App\Workshop\Solid\InterfaceSegregation\Bad;

class Car implements Vehicle
{
    public function drive()
    {
        echo 'Driving a car!';
    }

    public function fly()
    {
        throw new \Exception('Not implemented method');
    }
}
