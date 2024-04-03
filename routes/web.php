
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\StatisticController;

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'authIndex'])->name('home');

Route::controller(LinksController::class)->group(function (){
	Route::get('/link/{id}','show');
	Route::post('/link','store');
	Route::put('/link/{id}', 'update');
	Route::delete('/link/{id}', 'destroy');
});

Route::get('/lnk/{id}', [StatisticController::class,'redirect']);
