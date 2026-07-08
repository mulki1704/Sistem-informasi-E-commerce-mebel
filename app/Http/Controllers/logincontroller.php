<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logincontroller extends Controller
{
    public function profile()
    {
        return view('login.profile', [
            'title' => 'Profile',
        ]);
    }

    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/orders');
            }

            return redirect()->intended('/');
        }

        return back()->with('LoginError', 'Login gagal, cek email dan password Anda.');
    }

    public function adminIndex()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->intended('/admin/orders');
        }

        return view('admin.login', [
            'title' => 'Login Admin',
        ]);
    }

    public function adminAuthenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/orders');
            }

            Auth::logout();
            return back()->with('LoginError', 'Hanya admin yang bisa masuk di halaman ini.');
        }

        return back()->with('LoginError', 'Login gagal, cek email dan password Anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
