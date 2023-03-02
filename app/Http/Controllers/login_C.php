<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class login_C extends Controller
{
    public function register(){
        return view('logreg.register');
    }

    public function progis(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    public function index()
    {
        return view('logreg.login');
    }

    public function progin(Request $request)
    {
        $login = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($login)) {
            $request->session()->regenerate();
 
            return redirect()->intended('produk');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
}
?>