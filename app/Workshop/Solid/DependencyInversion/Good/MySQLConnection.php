<?php

namespace App\Workshop\Solid\DependencyInversion\Good;

class MySQLConnection implements DBConnection
{
    public function connect()
    {
        // Return the MySQL connection...
    }
}
