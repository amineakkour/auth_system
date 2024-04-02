<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function show(){
        return view("register");
    }

    function register(RegisterRequest $request){
        $data = $request->validated();
        
        $newRecord = new User();
        $newRecord->name = $data["name"];
        $newRecord->email = $data["email"];
        $newRecord->password = $data["password"];

        $newRecord->save();

        return redirect()->route("login.show")->with("success", "Vous etes bien connecté");
    }
}
