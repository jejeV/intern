<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register', [
            'title' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
        'name'=> 'required|max:225',
        'username' => ['required', 'min:3', 'max:225', 'unique:users'],
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255',
        'role' => 'required'
       ]);

       $validateData['password'] = Hash::make($validateData['password']);
       
       User::create($validateData);

       //  $request->session()->flash('success', 'Task was successful!');

       return redirect('/login')->with('success', 'Registation successfull! Please Login');
    }
}
