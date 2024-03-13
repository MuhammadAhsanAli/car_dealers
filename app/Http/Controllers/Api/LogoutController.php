<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            // Revoke the token of the authenticated user
            Auth::user()->token()->revoke();

            // Return a success response
            return response()->json(['message' => 'Logged out successfully'], 200);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Logout error: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'Failed to logout. Please try again.'], 500);
        }
    }
}
