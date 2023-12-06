<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
                'nik' => 'required',
                'name' => 'required|name|unique:users',
                'password' => 'required|min:6',
        ]);
    }
}
