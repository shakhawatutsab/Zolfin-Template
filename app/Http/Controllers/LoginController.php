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

        $user = new User;

        $user->name = $request->name;

        $user->username = $request->username;

        $user->photo = $request->photo;

        $user->password = bcrypt($request->password);

        $user->email = $request->email;

        // dd($request);
        $user->save();

        return redirect('/register')->with('message','Registration successful');

    }
}
