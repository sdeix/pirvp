<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->method() === 'POST') {
            $validator = Validator::make($request->all(), [
                'login' => ['required', 'unique:users,login'],
                'password' => ['required','min:6']
            ], [
                'required' => 'Поле :attribute пусто',
                'unique' => 'Поле :attribute должно быть уникально'
            ]);

            if ($validator->fails()) {
                return view('register', ['message' => $validator->errors()->toJson(JSON_UNESCAPED_UNICODE)]);
            }

            $user = User::create([
                'login' => $request['login'],
                'password' => bcrypt($request['password']),
                'role' => 'user'
            ]);
            if ($user) {
                return redirect('/login');
            }
        }

        return view('register');
    }


    public function login(Request $request)
    {
        if ($request->method() === 'POST') {
            $credentials = $request->only('login','password');
            if(Auth::attempt($credentials)){
                return redirect('posts/');
            }
            return view('login', ['message' => "Неверный логин ил пароль"]);
        }

        return view('login');
    }
    public function logout()
{
    Auth::logout();
    return redirect('login');
}
}