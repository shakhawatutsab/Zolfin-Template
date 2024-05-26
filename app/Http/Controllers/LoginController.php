<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginController extends Controller
{
    public function register(){
        return view("login.register", [
            "title"=> "Register",
        ]);
    }
    public function registerPost(Request $request){

        $user = User::create([
            "name"=> $request->name,
            "username"=> $request->username,
            "photo" => $request->photo,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),

        ]);

        return redirect('/register')->with('message','Registration successful');

    }
}
