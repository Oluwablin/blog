<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except(['logout']);
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->only('email','password');

        if ($this->webGuard()->attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return back()->with('error', 'Invalid credentials')->withInput();
    }

    public function logout(Request $request)
    {
        $this->webGuard()->logout();
        return back()->with('success', 'Thank you for your time!');
    }


    private function webGuard()
    {
        return Auth::guard('web');
    }

}
