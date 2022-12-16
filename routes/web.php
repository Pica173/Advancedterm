<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;

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
Route::get('/', [ShopController::class, 'index'])->name("index");
Route::post('/search', [ShopController::class, "search"])->name("form.search");
Route::post('/favorite/add/{id}', [ShopController::class, "add"])->name("form.add")->middleware('auth');
Route::post('/favorite/delete/{id}', [ShopController::class, "delete"])->name("form.delete");
Route::post('/favorite/deleteFrmMypage/{id}', [ShopController::class, "deleteFrmMypage"])->name("form.deleteFrmMypage");
Route::post('/shop/{id}', [ShopController::class, "show"])->name("form.show")->middleware('auth');
Route::get('/shop/{id}', [ShopController::class, "show"])->name("form.show")->middleware('auth');
Route::post('/reserve/{id}', [ShopController::class, "reserve"])->name("form.reserve");
Route::post('/reserve/delete/{id}', [ShopController::class, "reserveDelete"])->name("form.reserve-del");
Route::get('/mypage', [FavoriteController::class, "index"])->name("form.mypageindex")->middleware('auth');
Route::get('/dashboard', function () {
    return view('thanks');
})->middleware(['auth'])->name('thanks');

require __DIR__ . '/auth.php';