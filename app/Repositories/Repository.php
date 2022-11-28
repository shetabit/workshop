<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface Repository
{
//    public function list();
//    public function findById(int $id);
    public function create(array $inputs);
//    public function update(int $id, array $inputs);
//    public function delete(int $id);
}
