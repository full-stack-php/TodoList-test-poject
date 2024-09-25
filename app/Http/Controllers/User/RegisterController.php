<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return response()->json([
            'message' => 'User registered successfully',
            'returnUrl' => $this->loginUrl()
        ], 201);
    }

    private function loginUrl()
    {
        return url('/login');
    }

}
