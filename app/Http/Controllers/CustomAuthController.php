<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{


    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nik', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('message', 'Signed in!');
        }

        return redirect('/login')->with('message', 'Login details are not valid!');
    }

    public function signup()
    {
        return view('registration');
    }

    public function signupsave(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = $this->create($data);

        // Save user information to config.txt
        $configData = "NIK: " . $user->nik . "\n" . "Name: " . $user->name;
        file_put_contents('config.txt', $configData);

        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function create(array $data)
    {
      return User::create([
        'nik' => $data['nik'],
        'name' => $data['name'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('/login');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
    public function catatan(){
        return view('catatan');
    }
    public function isidata(){
        return view('isidata');
    }
    public function home(){
        return view('dashboard');
    }

    

}

