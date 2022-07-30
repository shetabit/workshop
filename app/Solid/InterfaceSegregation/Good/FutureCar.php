<?php

namespace App\Solid\InterfaceSegregation\Good;

class FutureCar implements DrivableVehicle, FlyableVehicle
{
    public function drive() {
        echo 'Driving a future car!';
    }

    public function fly() {
        echo 'Flying a future car!';
    }
}


