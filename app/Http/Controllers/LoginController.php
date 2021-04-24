<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    function login() {
        return view('login.index');
    }

    function checklogin(Request $request) {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)) {
            return redirect()->route('successlogin');
        }
        else {
            return back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }

    function successlogin() {
        if(!isset(Auth::user()->email)) {
            //return view('login.index');
            return redirect()->route('login');
        }

        return redirect()->route('admin');
    }

    function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}

?>
