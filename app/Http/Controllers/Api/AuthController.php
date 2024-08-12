<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
      $data = $request;
       /** @var User $user */
      $user = User::create([$data,
          "name" => $data['name'],
          "marketname" => $data['marketname'],
          "phone" => $data['phone'],
          "email" => $data['email'],
          "password" => $data['password']
    ]);

       $token = $user->createToken('main')->plainTextToken;

       return response()->json($user);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validate();
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Email and Password may be incorrect',
            ]);
        }
        /** @var User $user */
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;

        return response(compact('user', 'token'));
    }
    public function logout(Request $request)
    {
       /** @var User $user */
       $user = $request->user();
       $user->currentAccessToken()->delete();

       return response('', 204);
    }
}
