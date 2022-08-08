<?php

namespace App\Workshop\Solid\InterfaceSegregation\Bad;

class FutureCar implements Vehicle
{
    public function drive()
    {
        echo 'Driving a future car!';
    }

    public function fly()
    {
        echo 'Flying a future car!';
    }
}


