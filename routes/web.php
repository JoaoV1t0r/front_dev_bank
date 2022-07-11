<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserHomeController;

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
    return view('home');
})->name('home');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'postRegisterUser'])->name('register.post');

Route::get('recuperar-senha', [AuthController::class, 'showPasswordReset'])->name('password.reset');
Route::post('recuperar-senha/email', [AuthController::class, 'postPasswordReset'])->name('password.reset.email');
Route::get('recuperar-senha/codigo', [AuthController::class, 'showPasswordResetForm'])->name('password.reset.form');
Route::post('recuperar-senha', [AuthController::class, 'postPasswordResetForm'])->name('password.reset.post');

Route::get('home', [UserHomeController::class, 'index'])->name('user.home');
Route::get('create-account', [UserHomeController::class, 'createAccount'])->name('user.create_account');
Route::post('create-account', [UserHomeController::class, 'storeAccount'])->name('user.create_account.post');
Route::get('account/edit', [UserHomeController::class, 'editAccount'])->name('user.account.edit');
Route::post('account/edit', [UserHomeController::class, 'updateAccount'])->name('user.account.edit.post');
Route::get('registration-request', [UserHomeController::class, 'registrationRequest'])->name('user.registration_request');
Route::get('registration-request/{requestId}', [UserHomeController::class, 'confirmRegistrationRequest'])->name('user.registration_request.confirm');
Route::get('tranfer', [UserHomeController::class, 'transfer'])->name('user.transfer');
Route::post('tranfer', [UserHomeController::class, 'confirmTransfer'])->name('user.transfer.post');
Route::get('deposit', [UserHomeController::class, 'deposit'])->name('user.deposit');
Route::post('deposit', [UserHomeController::class, 'createDeposit'])->name('user.deposit.post');
Route::get('deposit/payer', [UserHomeController::class, 'confirmDeposit'])->name('user.deposit_payer');
Route::post('deposit/payer', [UserHomeController::class, 'confirmDepositPayer'])->name('user.deposit_payer.post');
