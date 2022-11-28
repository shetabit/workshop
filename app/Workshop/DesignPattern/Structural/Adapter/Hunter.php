<?php

namespace App\Workshop\DesignPattern\Structural\Adapter;

class Hunter
{
    public function hunt(Lion $lion): void
    {
        $lion->roar();
    }
}
