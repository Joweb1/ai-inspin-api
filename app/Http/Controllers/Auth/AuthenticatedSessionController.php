<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request) : Response
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        $token = $user->createToken('main')->plainTextToken;

        return response(compact('user', 'token'));
    }
    /* public function getUser(LoginRequest $request): Response
    {
    $request->authenticate();
    //$request->session()->regenerate();
    $user = Auth::user();
    
    $token = $user->createToken('main')->plainTextToken;
    return response(compact('user', 'token'));
    }
    /**
    * Destroy an authenticated session.
    */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $user = $request->user();

        $user->currentAccessToken()->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response( ' ', 204);
    }
}