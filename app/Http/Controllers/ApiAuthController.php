<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function handleRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:256'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'access_token' => Str::random(64)
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        return response()->json($user->access_token);
    }

    public function handleLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:256',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $is_user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if (!$is_user) {
            $errors = 'Credentials are not correct';
            return response()->json($errors);
        }
        $access_token = str::random(64);
        $user = User::where('email', $request->email)->update(['access_token' => $access_token]);
        return response()->json($access_token);
    }

    public function logout(Request $request)
    {
        $token = $request->access_token;
        $validator = Validator::make($request->all(), [
            'access_token' => 'required|string|max:100',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $user = User::where('access_token', $token)->first();
        if ($user !== null) {
            $user->update(['access_token' => null]);
            $success = 'Logged out successfully';
            return response()->json($success);
        }
        $errors = 'token not correct';
        return response()->json($errors);
    }
}
