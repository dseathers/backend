<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\RegisterService;
use App\Http\Requests\Validators\Auth\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterService $service)
    {
        return response()->json(
            $service->register($request->validated())
        );
    }
}
