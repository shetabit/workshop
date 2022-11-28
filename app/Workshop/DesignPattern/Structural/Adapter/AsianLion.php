<?php

namespace App\Workshop\DesignPattern\Structural\Adapter;

class AsianLion implements Lion
{
    public function roar()
    {
        echo 'AsianLion Lion is roaring...';
    }
}
