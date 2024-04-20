<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    function index(){
        $response = Gate::inspect("admin");

        if(!$response->allowed()){
            return view("errors.index", ["error_message" => $response->message()]);
        }
        
        $users = User::paginate(10);
        return view("users.show", compact("users"));
    }

    function edit(User $user){
        $response = Gate::inspect("update-user", $user);

        if(!$response->allowed()){
            return view("errors.index", ["error_message" => $response->message()]);
        }

        return view("users.edit", compact("user"));
    }

    function update(User $user, UpdateUserRequest $request){
        $response = Gate::inspect("update-user", $user);

        if(!$response->allowed()){
            return view("errors.index", ["error_message" => $response->message()]);
        }

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
        $response = Gate::inspect("admin", $user);

        if(!$response->allowed()){
            return view("errors.index", ["error_message" => $response->message()]);
        }
        $user->delete();
        return redirect()->back()->with("success", "User with #id" . $user->id . " was successfully deleted");
    }
}
