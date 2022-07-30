<?php

namespace App\Solid\InterfaceSegregation\Good;

class Airplane implements FlyableVehicle {

    public function fly() {
        echo 'Flying an airplane!';
    }
}
