<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get("/login", [LoginController::class, "show"])->name("login.show");

Route::post("/login", [LoginController::class, "login"])->name("login");

Route::get("/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/register", [RegisterController::class, "show"])->name("register.show");

Route::post("/register", [RegisterController::class, "register"])->name("register");

Route::get("/users", [UsersController::class, "show"])->name("users.show");

Route::get("/users/udpate/{user}", [UsersController::class, "showUpdate"])->name("users.update.show");

Route::delete("/users/delete/{user}", [UsersController::class, "destroy"])->name("users.destroy");
