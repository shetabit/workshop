<?php

namespace App\Solid\DependencyInversion\Good;

interface DBConnection
{
    public function connect();
}
