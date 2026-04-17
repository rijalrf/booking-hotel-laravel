<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    //view index login
    public function index()
    {
        return view('pages.auth.login');
    }

    //view register
    public function registerView()
    {
        return view('pages.auth.register');
    }

    //login action
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remeber = $request->isremenber == 'on';

        if (Auth::attempt($credentials, $remeber)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    //register action
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        DB::beginTransaction();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Employee::create([
            'user_id' => $user->id,
            'first_name' => $request->name,
            'last_name' => '', // Empty default
            'NIP' => time(), // Temporary unique NIP
            'email' => $request->email,
            'role' => 'staf', // Default role to staf
            'isActive' => true,
        ]);

        DB::commit();

        Auth::login($user);

        return redirect()->intended('/');
    }

    //logout action
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
