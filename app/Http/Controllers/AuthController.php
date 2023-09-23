<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view("auth.register"); 
    }

    public function store(){
        $formData = request()->validate([
            "name"=>['required'],
            "username"=>['required',Rule::unique("users","username")],
            "email"=>['required','email',Rule::unique("users","email")],
            "password"=>['required'],
        ]);
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success',"Welcome ".$user->name);
    }

    public function login(){
        return view("auth.login");
    }

    public function post_login(){
        $formData = request()->validate([
            "email"=>["required","email",Rule::exists("users","email")],
            "password" => ['required',"min:8"],
        ],[
            'email.required' =>"email is required."
        ]);
        if(auth()->attempt($formData)){
            if(auth()->user()->isAdmin){
                return redirect('/admin/dashboard')->with("success","Welcome from Admin Panel.");
            }
            return redirect('/')->with("success","Welcome Back.");
        }else{
            return redirect()->back()->withErrors([
                'email'=>'User Credential wrong.'
            ]);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with("success","See you");
    }
}
