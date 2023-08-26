<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        $user = new User([
            'name' => 'Usuario 1',
            'email' => 'mizael@email.com',
            'password' => bcrypt('123456789')
        ]);
        $user2 = new User([
            'name' => 'Usuario 2',
            'email' => 'mizael2@email.com',
            'password' => bcrypt('123456789')
        ]);
        $user3 = new User([
            'name' => 'Usuario 3',
            'email' => 'mizael3@email.com',
            'password' => bcrypt('123456789')
        ]);
        $user->save();
        $user2->save();
        $user3->save();

        return response()->json(['message' => 'Temporary user created successfully'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $request->user()->createToken('users')->plainTextToken], 200);
    }

}
