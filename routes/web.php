<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\EmailVerification;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

//Email Verification
Route::get('/send-mail/{id}', [EmailVerification::class, 'sendMail'])->name('sendMail');
Route::get('/verification/{id}/{token}', [EmailVerification::class, 'index'])->name('verification');
Route::post('/verify', [EmailVerification::class, 'verify'])->name('verify');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('register', [RegisterController::class, 'index'])->name('register');

    Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
    Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
});

Route::get('logout', [LogoutController::class, 'index'])->name('logout');

//Forgot Password
Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgotPassword');
Route::get('forgot-password/send-mail/{id}', [ForgotPasswordController::class, 'sendMail'])->name('forgotPasswordSendMail');
Route::get('forgot-password/verification/{id}/{token}', [ForgotPasswordController::class, 'varification'])->name('forgotPasswordVerification');
Route::post('forgot-password/verify', [ForgotPasswordController::class, 'verify'])->name('forgotPasswordVerify');
Route::get('change-password/{id}/{token}', [ChangePasswordController::class, 'index'])->name('changePassword');
Route::post('change-password/', [ChangePasswordController::class, 'change_password'])->name('changePasswordPost');

Route::middleware(['auth', 'verify'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::resource('admin/setup/roles', RoleController::class);
});
