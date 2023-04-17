<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('anggota')->except('logout');
        // $this->middleware('admin')->except('logout');
        // $this->middleware('petugas')->except('logout');   
    }

    public function showFormLogin()
    {
       return view('login');
    }

    public function FunctionName(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required','username'],
            'password' => ['required','password']
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('');
        }

    }

}
