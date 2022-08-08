<?php

namespace App\Workshop\Solid\SingleResponsibility\Good;

use App\Http\Controllers\Controller;
use App\Http\Requests\Solid\UserStoreRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function store(UserStoreRequest $request, UserRepository $repository)
    {
        $user = $repository->create($request);

        return response()->json(['user' => $user]);
    }
}
