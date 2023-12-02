<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginIndex(){
        return view('guest.login.login', [
            'title' => 'Login'
        ]);
    }

    public function regisIndex() {
        return view('guest.login.register',[
            'title' => "Register"
        ]);
    }

    public function loginAuth(Request $request){
        $dataValidation = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($dataValidation)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('login_error', 'Failed to login');
    }

    public function registerInput(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'username' => ['required', 'unique:users,username'],
            'password' => ['required'],
            'email' => 'required',
            'country' => 'required'
        ]);
        User::create($validatedData);

        return redirect('/login')->with('register_success', 'Registration Success');
    }

    public function logoutController(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
