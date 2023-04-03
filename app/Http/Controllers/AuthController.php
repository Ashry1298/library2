<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthValidation;
use App\Http\Requests\LoginValidation;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function handleregister(AuthValidation $request)
    {
 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route("auth.login");
    }
    public function handleLogin(LoginValidation $request)
    {

        $is_user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($is_user) {
            return redirect()->route('book.index');
        } else {
            return redirect()->route('auth.login');
    }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
