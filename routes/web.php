
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'authIndex'])->name('home');

Route::controller(LinksController::class)->group(function (){
	Route::get('/link/{id}','show');
	Route::post('link','store');
});
