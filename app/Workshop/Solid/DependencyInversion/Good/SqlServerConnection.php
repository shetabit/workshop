<?php

namespace App\Workshop\Solid\DependencyInversion\Good;

class SqlServerConnection implements DBConnection
{
    public function connect()
    {
        // Return the MySQL connection...
    }
}
