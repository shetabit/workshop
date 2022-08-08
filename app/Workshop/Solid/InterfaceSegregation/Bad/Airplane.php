<?php

namespace App\Workshop\Solid\InterfaceSegregation\Bad;

class Airplane implements Vehicle {

    public function drive()
    {
        throw new \Exception('Not implemented method');
    }

    public function fly()
    {
        echo 'Flying an airplane!';
    }
}
