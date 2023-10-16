<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('sesi.index');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            Session::flash('user', $user); 

            if ($user->isAdmin()) {
                return redirect('/admin')->with('success', 'Successfully logged in as admin');
            } else {
                return redirect('/')->with('success', 'Successfully logged in');
            }
        } else {
            return redirect('login')->withErrors('Email or password is incorrect');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Successfully logged out');
    }

    function register()
    {
        return view('sesi.register');

    }

    function create(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ], [
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'email.unique' => 'Email has already been taken',
                'name.required' => 'Please enter your name',
                'password.required' => 'Password is required',
                'password.min' => 'Password is too short (minimum is 6 characters)',
                'password.confirmed' => 'Password confirmation does not match'
            ]);

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ];

        User::create($data);
        /*
        INSERT INTO users (email, name, password)
        VALUES ('<email>', '<name>', '<password>');
        */

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/')->with('success', Auth::user()->name . ' has logged in');
        }
    }
}