<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function show(){
        // $users = User::all();
        $users = User::paginate(10);
        return view("users.show", compact("users"));
    }

    function edit(User $user){
        return view("users.edit", compact("user"));
    }

    function update(User $user, Request $request){
            return $request;
    }

    function destroy(User $user){
        $user->delete();
        return redirect()->back()->with("success", "User with #id" . $user->id . " was successfully deleted");
    }
}
