<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get("/",[HomeController::class,"index"]);
Route::get("/users",[AdminController::class,"user"]);
Route::get("/foodmenu",[AdminController::class,"foodmenu"]);
Route::post("/uploadfood",[AdminController::class,"upload"]);
Route::post("/uploadcheif",[AdminController::class,"uploadcheif"]);
Route::get("/deletemenu/{id}",[AdminController::class,"deletemenu"]);
Route::get("/updatemenu/{id}",[AdminController::class,"updatemenu"]);
Route::post("/reservation",[AdminController::class,"reservation"]);
Route::get("/viewreservation",[AdminController::class,"viewreservation"]);
Route::get("/viewcheif",[AdminController::class,"viewcheif"]); 
Route::post("/update/{id}",[AdminController::class,"update"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);
Route::get("/redirects",[HomeController::class,"redirects"]);
Route::get("/updatecheif/{id}",[AdminController::class,"updatecheif"]);
Route::post("/updatecheifs/{id}",[AdminController::class,"updatecheifs"]);
Route::get("/deletecheif/{id}",[AdminController::class,"deletecheif"]);
Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);
Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);
Route::get("/orders",[AdminController::class,"orders"]);
Route::get("/search",[AdminController::class,"search"]);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
