<?php

namespace App\Workshop\Solid\InterfaceSegregation\Good;

class Airplane implements FlyableVehicle
{

    public function fly()
    {
        echo 'Flying an airplane!';
    }
}
