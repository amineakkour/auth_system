<?php

use App\Services\Calcul;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {return view('home');})->name("home");

Route::controller(LoginController::class)->group(function () {
    Route::prefix("login")->name("login")->group(function (){
        Route::get("/", "show")->name(".show")->middleware("guest");
        Route::post("/", "login")->name("");
    });
    Route::get("/logout", "logout")->name("logout");
});

Route::controller(RegisterController::class)->group(function () {
    Route::prefix("register")->name("register")->group(function (){
        Route::get("/", "show")->name(".show")->middleware("guest");
        Route::post("/", "register")->name("");
    });
});

Route::resource("users", UsersController::class)->middleware("auth");

Route::get("calcul/{a}/{b}/{c}", function ($a, $b, $c, Calcul $calcul){
    return $calcul->sum($a, $b, $c);
});

Route::get("json", function (Request $request) {
    $response = new Response(["name" => "amineakkour"]);

    dd($request->ip());
    return $response->withHeaders([
        "status" => 403,
        "Content-Type" => "application/json", 
        "X-code" => "GJW9"
    ]);
});