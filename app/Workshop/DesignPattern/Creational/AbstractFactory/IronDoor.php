<?php

namespace App\Workshop\DesignPattern\Creational\AbstractFactory;

class IronDoor implements Door
{
    public function getDescription()
    {
        echo 'I am a iron door';
    }
}
