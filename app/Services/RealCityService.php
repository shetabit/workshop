<?php

namespace App\Services;

use App\Interfaces\CityListInterface;

class RealCityService implements CityListInterface
{
    public function getList(): array
    {
        return City::all()->toArray();
    }
}
