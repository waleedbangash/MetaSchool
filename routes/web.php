<?php

use App\Http\Controllers\GroceryController;
use App\Models\Grocery;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'grocery','middelware'=>['auth']],function(){
    Route::get('dashboard',[GroceryController::class,'index'])->name('user.dashboard');
    Route::get('creat-grocery',[GroceryController::class,'createGrocery'])->name('grocery.createGrocery');
    Route::post('store-grocery',[GroceryController::class,'storeGrocery'])->name('grocery.storeGrocery');
    Route::get('show-grocery',[GroceryController::class,'showGrocery'])->name('grocery.showGrocery');


});


