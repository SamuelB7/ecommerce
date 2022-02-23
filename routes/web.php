<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\UserController;
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

/* Route::get('/', function () {
    return view('home');
});
 */
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');



Route::middleware('isAdmin')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    //Route::delete('/admin/users/{id}', [UserController::class, 'softDelete'])->name('users.softDelete');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    
});
