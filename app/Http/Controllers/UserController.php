<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function login()
    {
        return view("account.login");
    }

    public function register()
    {
        return view("account.register");
    }

    public function signup(Request $request)
    {
        $username = $request->input("username");
        $password = $request->input("password");
        $email = $request->input("email");

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = Hash::make($password);
        if ($user->save()) {
            return redirect()->route("login")->with("success", "đăng kí thành công");
        }
        return abort(404);
    }

    public function signin(Request $request)
    {
        $remember = $request->remember;
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('home');
        }
        return back()->with('false', 'Tài khoản hoặc mật khẩu không chính xác!!');
    }
}
