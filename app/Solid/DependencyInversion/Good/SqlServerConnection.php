<?php

namespace App\Solid\DependencyInversion\Good;

class SqlServerConnection implements DBConnection
{
    public function connect()
    {
        // Return the MySQL connection...
    }
}
