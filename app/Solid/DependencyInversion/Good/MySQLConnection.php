<?php

namespace App\Solid\DependencyInversion\Good;

class MySQLConnection implements DBConnection
{
    public function connect()
    {
        // Return the MySQL connection...
    }
}
