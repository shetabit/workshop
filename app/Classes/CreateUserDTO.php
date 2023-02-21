<?php

namespace App\Classes;

class CreateUserDTO
{
    public function __construct(
        private string $name,
        private string $email,
        private string $username,
        private string $password
    ) {}

    // Add getters, setters, validation
}


//How to use
//class UserController extends Controller
//{
//    public function store(Request $request): JsonResponse
//    {
//        return response()->json([
//            $this->service->createUser(new CreateUserDTO(...$request->all())),
//            Response::HTTP_CREATED
//        ]);
//    }
//}
