<?php

namespace App\Workshop\DesignPattern\Creational\SimpleFactory;

class DoorFactory
{
    public static function makeDoor($width, $height): Door
    {
        return new WoodenDoor($width, $height);
    }
}
