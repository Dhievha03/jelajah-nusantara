<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function register()
    {
        return view('user.auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or password invalid',
        ])->onlyInput('email');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:8|max:255'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.login')->with('success', 'Akun telah dibuat silahkan login terlebih dahulu');
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
            $cek_user = User::where('email', $user->email)->first();
            if ($cek_user) {
                Auth::login($cek_user);
                return redirect()->route('user.dashboard');
            }else{
                $new_user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                ]);
                Auth::login($new_user);
                return redirect()->route('user.dashboard');
            }  
        }catch(\Throwable $th){
            return 403;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

}
