<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request, RegisterService $registerService){
        $result = $registerService->register($request->all());

        return response()->json(
            $result,
            $result['status']
        );
    }
}
