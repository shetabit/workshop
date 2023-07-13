<?php

namespace App\Services;

use App\Interfaces\CityListInterface;

class FakeCityService implements CityListInterface
{
    public function getList(): array
    {
        return config('app.fake_cities');
    }
}
