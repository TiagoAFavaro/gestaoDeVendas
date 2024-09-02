<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->withErrors(['message' => 'Usuário ou senha inválidos']);
        }

        return redirect('/dashboard');
    }

    public function destroy() {
        Auth::logout();

        return to_route('login');
        
    }
}
