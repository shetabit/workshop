<?php

namespace App\Workshop\DesignPattern\Creational\AbstractFactory;

class WoodenDoor implements Door
{
    public function getDescription()
    {
        echo 'I am a wooden door';
    }
}
