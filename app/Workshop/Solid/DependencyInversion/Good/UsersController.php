<?php

namespace App\Workshop\Solid\DependencyInversion\Good;

use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;

class UsersController
{
    public function index(UserRepository $repository): \Illuminate\Http\JsonResponse
    {
        $users = $repository->getAfterDate(Carbon::yesterday());

        return response()->json([
            'users' => $users
        ]);
    }
}
