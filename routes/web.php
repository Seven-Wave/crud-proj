<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return redirect('/users');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login_process', [App\Http\Controllers\AuthController::class, 'login'])->name('login_process');


Route::middleware("auth")->group(function () {
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::name('users.')->prefix('users')->group(function() {
        Route::get('/', function () {
            return view('users');
        });

        Route::get('/{id}', function ($id) {
            $user = User::find($id);
            return view('user_form', compact('user'));
        });

        Route::get('/create', function () {
            return view('user_form', ['user' => '']);
        });

        Route::post('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
        Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
        Route::post('/get', [App\Http\Controllers\UserController::class, 'index'])->name('get');
        Route::post('/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');

        # Payments
        Route::get('{id}/payments', [App\Http\Controllers\PaymentController::class, 'index']);
        Route::post('/payment/delete', [App\Http\Controllers\PaymentController::class, 'delete']);
    });
});



