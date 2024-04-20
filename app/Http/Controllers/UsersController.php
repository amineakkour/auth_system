<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    function index(){
        Gate::authorize("show-users");
        $users = User::paginate(10);
        return view("users.show", compact("users"));
    }

    function edit(User $user){
        if(Gate::allows("update-user", $user)){
            return view("users.edit", compact("user"));
        }else{
            abort(403);
        }
    }

    function update(User $user, UpdateUserRequest $request){
        $validated = $request->validated();

        if(!Gate::allows("update-user", $user)){
            abort(403);
        }

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
