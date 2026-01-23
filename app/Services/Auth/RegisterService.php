<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Models\UserProfile\Profile;

class RegisterService
{
    public function Register(array $data): array
    {
        $user = User::Create([
                'name'=> $data['name'],
                'email'=> $data['email'],
                'phone'=> $data['phone'],
                'password'=> $data['password']
        ]);

        Profile::Create([
            'user_id'=> $user->id,
            'user_name'=> $user->name,

        ]);

        return [
                'status'=> '200',
                'process'=> 'success'
        ];
    }
}
