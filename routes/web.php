<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get("/login", [LoginController::class, "show"])->name("login.show");

Route::post("/login", [LoginController::class, "login"])->name("login");

Route::get("/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/register", [RegisterController::class, "show"])->name("register.show");

Route::post("/register", [RegisterController::class, "register"])->name("register");

