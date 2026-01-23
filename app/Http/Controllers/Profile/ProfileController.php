<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Validators\Profile\ProfileValidator;
use App\Services\Profiles\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(ProfileValidator $profileValidator, ProfileService $profileService)
    {
       return response()->json(
            $profileService->profile($profileValidator->validated())
       );
    }
}
