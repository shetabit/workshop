<?php

namespace App\Workshop\Solid\DependencyInversion\Bad;

use App\Models\User;

class UserDB
{
    private MySqlConnection $dbConnection;

    public function __construct(MySQLConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function store()
    {
        // Store the user into a database...
        $this->dbConnection->connect();
    }

}
