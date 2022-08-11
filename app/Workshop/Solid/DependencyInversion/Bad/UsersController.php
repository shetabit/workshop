<?php

namespace App\Workshop\Solid\DependencyInversion\Bad;

use App\Models\User;
use Carbon\Carbon;

class UsersController
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $users = User::query()
            ->whereDate('created_at', '>=', Carbon::yesterday())
            ->get();

        return response()->json([
            'users' => $users,
        ]);
    }
}
