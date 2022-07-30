<?php

namespace App\Solid\InterfaceSegregation\Good;

class Car implements DrivableVehicle {

    public function drive() {
        echo 'Driving a car!';
    }
}
