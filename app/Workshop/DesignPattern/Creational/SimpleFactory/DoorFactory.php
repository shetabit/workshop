<?php

namespace App\Workshop\DesignPattern\Creational\SimpleFactory;

class DoorFactory
{
    public static function makeDoor(float $width, float $height): Door
    {
        return new WoodenDoor($width, $height);
    }
}
