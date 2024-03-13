<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * Authenticate the user and generate an access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check for validation failure
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // If authentication is successful, generate an access token
            $user = Auth::user();
            $accessToken = $user->createToken('car_dealers')->accessToken;

            // Return the access token along with user details
            return response()->json([
                'token' => [
                    'access_token' => $accessToken,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]
            ], 200);
        } else {
            // If authentication fails, return an error response
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    /**
     * Validate the access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateToken(Request $request): JsonResponse
    {
        // Extract the token from the request
        $token = $request->bearerToken();

        // Check if the token exists
        if (!$token) {
            return response()->json(['error' => 'Token is missing'], 401);
        }

        try {
            // Attempt to retrieve the authenticated user
            $user = Auth::guard('api')->user();

            // Check if the user exists
            if ($user) {
                // If the user exists, return a success response
                return response()->json(['message' => 'Token is valid'], 200);
            } else {
                // If the user does not exist, throw an authentication exception
                throw new AuthenticationException();
            }
        } catch (AuthenticationException $e) {
            // If an authentication exception is caught, return an error response
            return response()->json(['error' => 'Invalid token'], 403);
        }
    }
}
