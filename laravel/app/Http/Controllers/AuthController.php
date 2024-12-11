<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required'
            ]);

            if ($validatedData->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Validation error',
                    'errors'  => $validatedData->errors()
                ], 401);
            }

            if ( ! Auth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Unauthorized'
                ], 401);
            }

            $user = Auth::user();

            $token = $user->createToken("API TOKEN")->plainTextToken;

            return response()->json([
                'status'  => true,
                'message' => 'Login successful',
                'token'   => $token
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Logout successful'
        ], 200);

    }


    public function isLoggedIn(Request $request): JsonResponse
    {
        return response()->json(Auth::check(), 200);
    }


    public function changePassword(Request $request): JsonResponse
    {
        $user = User::find(auth()->user()->id);

        if (Hash::check($request->input('old_password'), $user->password)) {
            // Old password matches, proceed with changing the password.
            $newPassword = $request->input('new_password');
            $user->password = Hash::make($newPassword); // Hash and save the new password
            $user->save();

            return response()->json(['message' => 'Password changed successfully.']);
        } else {
            // Old password does not match.
            return response()->json(['error' => 'The old password is incorrect.'], 400);
        }
    }

}
