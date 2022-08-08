<?php

namespace App\Workshop\Solid\DependencyInversion\Good;

use App\Models\User;

class UserDB
{
    private DBConnection $dbConnection;

    public function __construct(DBConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function store()
    {
        // Store the user into a database...
        $this->dbConnection->connect();
    }

}

$sqlServer = new SqlServerConnection();
$userDb = new UserDB($sqlServer);
$userDb->store();
