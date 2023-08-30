<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);
        $token = $user->createToken('laravel')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $token,
            'user' => $user,
        ], 201);
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|',
            'password' => 'required|min:6'

        ]);
        $user=User::where('email',$data['email'])->first();
        if (!$user ||!Hash::check($data['password'], $user->password)) {
            return response()->json([
              'status' => false,
              'message' => 'Invalid Credentials'
            ], 401);
        }
        Auth::login($user);
        $token = $user->createToken('laravel')->plainTextToken;
        return response()->json([
          'status' => true,
          'message' => 'Login Successfully',
            'token' => $token,
            'user' => $user,
            ], 201);
    }
    public function logout(Request $request)
    {
      $request->user()->currentAccessToken->delete();
      Auth::logout();
      return response()->json([
      'status' => true,
      'message' => 'Logout Successfully'
      ], 201);
    }
}
