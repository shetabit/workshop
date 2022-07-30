<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserRepository implements Repository
{
    public function create(Request $request): User
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return $user;
    }

    public function getAfterDate(Carbon $date)
    {
        return User::query()
            ->whereDate('created_at', '>=', $date)
            ->get();
    }
}
