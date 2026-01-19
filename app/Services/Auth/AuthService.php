<?php

namespace App\Services\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;


class AuthService
{
    public function login(array $credentials): array
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            return [
                'status'  => 400,
                'process' => 'failed',
                'message' => 'Invalid check your credential'
            ];
        }

        return [
            'status'  => 200,
            'process' => 'success',
            'token'   => $token
        ];
    }
}
