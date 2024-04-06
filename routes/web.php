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

Route::resource("users", UsersController::class);