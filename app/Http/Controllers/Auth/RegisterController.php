<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\CreateUserRequest;

class RegisterController extends Controller
{
    public function register(CreateUserRequest $request, User $user)
    {
        $userData = $request->only('name', 'email', 'password');
        $userData['password'] = bcrypt($userData['password']);

        if(!$user = $user->create($userData))
            abort(500, "Erro ao criar usuário");

        return response()->json([
            'data' => [
                'user' => $user
            ]
        ]);
    }
}
