<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registercontroller extends Controller
{
    public function index()
    {
        return view('login.register', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $validatedData['name']     = $validatedData['username'];
        $validatedData['role']     = 'user';
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['image']    = 'users/default.png';

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
