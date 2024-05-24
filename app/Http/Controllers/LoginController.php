<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function register(){
        return view("login.register", [
            "title"=> "Register",
        ]);
    }
    public function registerPost(Request $request){
        dd( $request );
    }
}
