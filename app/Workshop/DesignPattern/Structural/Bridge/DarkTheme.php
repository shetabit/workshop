<?php

namespace App\Workshop\DesignPattern\Structural\Bridge;

class DarkTheme implements Theme
{
    public function getColor()
    {
        return 'Dark Black';
    }
}
