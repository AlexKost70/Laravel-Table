<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('loginPage');
    }

    public function login (LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::query()->where('username', $data['login'])
            ->first();

        if (!$user) {
            return redirect()->back();
        }

        if ($user && Hash::check($data['password'], $user->password))
        {
            Auth::login($user);
            return view("main");
        }

        return redirect()->back();

    }

    public function logout () {

        Auth::logout();
        return redirect()->route('loginPage');
    }
}
