<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

use function Laravel\Prompts\error;

class RegisterService
{
    public function Register(array $data): array
    {
        $validator = Validator::make($data, [
            'name'     => 'required|string|max:100',
            'email'    => 'required|string|email|max:100|unique:users',
            'phone'    => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return [
                'status'=> '400',
                'process'=> 'failed',
                'message detail'=> $validator->error()
            ];
        }

        $user = User::Create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'phone'=> $data['phone'],
            'password'=> $data['password']
        ]);

        return [
                'status'=> '200',
                'process'=> 'success'
        ];
    }
}
