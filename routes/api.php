<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('user', [UserController::class, 'index'])->name('user.index');
    // Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
