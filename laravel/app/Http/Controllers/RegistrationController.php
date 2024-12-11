<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validatedData = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        if ($validatedData->fails()) {
            return response()->json(
                [
                    'status'  => false,
                    'message' => 'Validation error',
                    'errors'  => $validatedData->errors()
                ], 401);
        }

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $token = $user->createToken("API TOKEN")->plainTextToken;

        return response()->json([
            'status'  => true,
            'message' => 'Registration successful',
            'token'   => $token
        ], 200);
    }
}
