<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function show(){
        return view("login");
    }

    function login(LoginRequest $request){
        $validated_data =  $request->validated();
        
        if(Auth::attempt($validated_data)){
            $request->session()->regenerate();
            return redirect()->route("home");
        }else{
            return redirect()->back()
                ->with("error", "Email ou mot de passe incorrect")
                ->with("email", $validated_data["email"]);
        }
    }

    function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route("login")->with("success", "Vous êtes déconnecté avec succès");
    }
}
