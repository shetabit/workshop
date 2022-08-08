<?php

namespace App\Workshop\Solid\InterfaceSegregation\Good;

class Car implements DrivableVehicle
{

    public function drive()
    {
        echo 'Driving a car!';
    }
}
