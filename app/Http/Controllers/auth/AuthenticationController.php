<?php

namespace App\Http\Controllers\auth;

use App\Events\SendVerificationCodeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginAuthenticationRequest;
use App\Http\Requests\auth\RegisterAuthenticationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(LoginAuthenticationRequest $request)
    {
        $request->validated();

        $autorization = ['user-common'];

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        if ($user->is_cradt) {
            $autorization[] = 'user-cradt';
        }
        if ($user->is_den) {
            $autorization[] = 'user-den';
        }

        if ($user->teachers()) {
            $autorization[] = 'user-teacher';
        }
        if ($user->teachers()->whereHas('coordinator')->exists()) {
            $autorization[] = 'user-coordinator';
        }


        $token = $user->createToken(
            $user->email,
            $autorization
        )->plainTextToken;

        return response([
            'token' => $token
        ], 200);
    }

    public function register(RegisterAuthenticationRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->password = Hash::make($request->password);
        $user->save();

        event(new SendVerificationCodeEvent($user->email));

        $token = $user->createToken(
            $user->email,
            ['user-common']
        )->plainTextToken;

        return response([
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response([
            'message' => 'Logged out'
        ], 200);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function refresh(Request $request)
    {
        $user = $request->user();
        $autorization = ['user-common'];

        if ($user->is_cradt) {
            $autorization[] = 'user-cradt';
        }
        if ($user->is_den) {
            $autorization[] = 'user-den';
        }

        if ($user->teachers()) {
            $autorization[] = 'user-teacher';
        }

        if ($user->teachers()->coordinators()) {
            $autorization[] = 'user-coordinator';
        }

        $token = $user->createToken(
            $user->email,
            $autorization
        )->plainTextToken;

        return response([
            'token' => $token
        ], 200);
    }

    public function changeUserRole(Request $request, User $user)
    {
        $request->validate([
            'is_cradt' => 'required|boolean',
            'is_den' => 'required|boolean',
        ]);

        $user->is_cradt = $request['is_cradt'];
        $user->is_den = $request['is_den'];
        $user->save();

        return response([
            'message' => 'User role updated successfully'
        ], 200);
    }
}
