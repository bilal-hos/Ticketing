<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validated_data = $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required',
                'password' => 'required|min:8', // Use confirmed if you have a password confirmation field

            ]
        );
        $validated_data['password'] = Hash::make($validated_data['password']);

        $user = User::create($validated_data);

        $token = $user->createToken('auth')->plainTextToken;

        return response()->json(
            [
                'message' => 'User created succseffuly',
                'statsus' => 'success',
                'data' => $user,
                'token' => $token,
            ]
        );
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Token')->plainTextToken;
            $user->makeHidden('password');
            return response()->json([
                'message' => 'logged in successfully',
                'succsess' => true,
                'user' => $user,
                'token' => $token,
            ],);
        } else {
            return response()->json(
                [
                    'message' => 'Invalid credentials',
                    'succses' =>  false,
                    'data' => '',
                ]
            );
        }
    }
}
