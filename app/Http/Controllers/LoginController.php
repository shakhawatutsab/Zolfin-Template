<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginController extends Controller
{
    public function register(){
        return view("authentication.register", [
            "title"=> "Register",
        ]);
    }
    public function registerPost(Request $request){

        $info = $request->validate([
            "name" =>"required|max:300",
            "username" => "required",
            "photo"=>"required",
            "password" =>"required|min:8",
            "email"=> "required|email|unique:users",
        ]);

        $user = User::create($info);

        return redirect('/register')->with('message','Registration successful');

    }
    public function login(){
        return view('authentication.login',[
            'title'=>'login'
        ]);
    }
}
