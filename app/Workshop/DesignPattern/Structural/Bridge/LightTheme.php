<?php

namespace App\Workshop\DesignPattern\Structural\Bridge;

class LightTheme implements Theme
{
    public function getColor()
    {
        return 'Off white';
    }
}
