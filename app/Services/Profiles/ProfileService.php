<?php

namespace App\Services\Profiles;

use App\Models\UserProfile\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function profile(array $data): array
    {   
        $userId = Auth::id();

        $dataToUpdate = array_filter([
            'birth_date'  => $data['birthDate']  ?? null,
            'birth_place' => $data['birthPlace'] ?? null,
            'address'     => $data['address']    ?? null,
            'residence'   => $data['residence']  ?? null,
            'gender'      => $data['gender']     ?? null,
        ], fn ($value) => !is_null($value));

        Profile::updateOrCreate(
            ['user_id' => $userId],
            $dataToUpdate
        );

    return [
        'status'  => 200,
        'process' => 'success',
        'messageDetail' => null
    ];
}
}
