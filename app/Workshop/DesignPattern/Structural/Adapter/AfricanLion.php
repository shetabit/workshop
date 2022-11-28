<?php

namespace App\Workshop\DesignPattern\Structural\Adapter;

class AfricanLion implements Lion
{
    public function roar()
    {
        echo 'AfricanLion is roaring...';
    }
}
