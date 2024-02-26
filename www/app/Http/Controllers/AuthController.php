<?php

namespace App\Http\Controllers;



use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginPage(): View
    {
        return view('auth.login');
    }

    public function registrationPage(): View
    {
        return view('auth.registration');
    }

    public function registration(Request $request): RedirectResponse
    {
        $request->validate([
           'name' => 'required',
           'surname' => 'required',
           'login' => 'required',
           'email' => 'required|email',
           'password' => 'required',
        ]);
//        dd($request->password == $request->passwordTwo);
        $checkPassword = $request->password == $request->passwordTwo;
        if ($checkPassword == true) {
            $user = User::query()->create([
                'name' => $request->name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic??NULL,
                'login' => $request->login,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Cart::query()->create([
                'user_id' => $user->id
            ]);
            return redirect(route('loginPage'));
        }
        return redirect(route('registrationPage'));

    }

    public function login(Request $request): RedirectResponse
    {
        if (auth()->attempt([
            'login' => $request->login,
            'password' => $request->password,
        ])) {
            return redirect('/');
        }
        return redirect(route('loginPage'));
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect('/');
    }
}
