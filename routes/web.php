<?php

use App\Http\Controllers\AuthController;
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
})->name('welcome');

Route::group(['middleware' => 'guest'], function () {
    //login route
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    //register route
    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //profile
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('editProfile/{id}', [AuthController::class, 'editProfile'])->name('editProfile');
    Route::put('updateProfile/{id}', [AuthController::class, 'updateProfile'])->name('updateProfile');
    Route::get('destroyProfile/{id}', [AuthController::class, 'destroyProfile'])->name('destroyProfile');

    ///account Rooute
    Route::post('createAccount', [AuthController::class, 'createAccount'])->name('createAccount');
    Route::get('editAccount/{id}', [AuthController::class, 'editAccount'])->name('editAccount');
    Route::put('updateAccount/{id}', [AuthController::class, 'updateAccount'])->name('updateAccount');
    Route::get('destroyAccount/{id}', [AuthController::class, 'destroyAccount'])->name('destroyAccount');
    Route::get('account', [AuthController::class, 'account'])->name('account');
    Route::get('loggedUser', [AuthController::class, 'loggedUser'])->name('loggedUser');

    //expense route
    Route::get('expense', [AuthController::class, 'expense'])->name('expense');
    Route::post('create', [AuthController::class, 'create'])->name('create');
    Route::get('editExpense/{id}', [AuthController::class, 'editExpense'])->name('editExpense');
    Route::put('updateExpense/{id}', [AuthController::class, 'updateExpense'])->name('updateExpense');
    Route::get('deleteExpense/{id}', [AuthController::class, 'destroyExpense'])->name('destroyExpense');
});
