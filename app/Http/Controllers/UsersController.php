<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    
    function index(){
        // $users = User::all();
        $users = User::paginate(10);
        return view("users.show", compact("users"));
    }

    function edit(User $user){
        return view("users.edit", compact("user"));
    }

    function update(User $user, UpdateUserRequest $request){
        $validated = $request->validated();

        
        if($request->hasFile("image")){
            $image = $request->file("image");
            $imageName = time() . Str::random(2) .  '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/users'), $imageName);
            
            $user->name = $validated["name"];
            $user->username = $validated["username"];
            $user->birthday = $validated["birthday"];
            $user->email = $validated["email"];
            $user->image = $imageName;

            $user->save();
            
            return back()->with("success", "You have successfully updated the user!");
        };

        $user->update($validated);

        $user->save();

        return back()->with("success", "You have successfully updated the user!");
    }

    function destroy(User $user){
        $user->delete();
        return redirect()->back()->with("success", "User with #id" . $user->id . " was successfully deleted");
    }
}
