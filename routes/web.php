<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');})->name("home");

Route::controller(LoginController::class)->group(function () {
    Route::prefix("login")->name("login")->group(function (){
        Route::get("/", "show")->name(".show");
        Route::post("/", "login")->name("");
    });
    Route::get("/logout", "logout")->name("logout");
});

Route::controller(RegisterController::class)->group(function () {
    Route::prefix("register")->name("register")->group(function (){
        Route::get("/", "show")->name(".show");
        Route::post("/", "register")->name("");
    });
});


Route::controller(UsersController::class)->group(function () {
    Route::prefix("users")->name("users")->group(function (){
        Route::get("/","show")->name(".show");
        Route::get("/udpate/{user}","edit")->name(".edit");
        Route::put("/udpate/{user}", "update")->name(".update");
        Route::delete("/delete/{user}", "destroy")->name(".destroy");
    });
});
