<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\AuthService;

class LoginController extends Controller
{
    public function __invoke(Request $request, AuthService $authService)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string'
        ]);

        $result = $authService->login($credentials);
        return response()->json($result, $result['status']);

    }
}

