<?php

namespace App\Workshop\DesignPattern\Structural\Bridge;

class AquaTheme implements Theme
{
    public function getColor()
    {
        return 'Light blue';
    }
}
