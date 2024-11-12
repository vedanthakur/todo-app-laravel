<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function signupForm(){
        return view('signup');
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $users = User::all();
        if (!isset($users[0]->id)) { // no users are there
            $user = new User($data);
            $user->role = 'admin';
            $user->save();
            
            return redirect()->route('login.form');
        }


        $user = User::create($data);

        if ($user) {
            return redirect()->route('login.form');
        }
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        if(Auth::attempt($data, $request->remember)) {
            return redirect()->route('tasks.index');
        }

        return redirect()->back();


    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
