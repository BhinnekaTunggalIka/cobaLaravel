<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/food', FoodController::class); // cara laravel
// Route::get('/food', [FoodController::class, 'index']);
// Route::get('/food/create', [FoodController::class, 'create']);// nampilin form create
// Route::post('/food', [FoodController::class, 'store']);// nyimpen/nambahin data
// Route::get('/food/{food}/edit', [FoodController::class, 'edit']); // nampilin form edit
// Route::patch('/food/{food}', [FoodController::class, 'update']); // nyimpen/update data
// Route::delete('/food/{food}',[FoodController::class, 'destroy']);// hapus data