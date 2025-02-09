<?php
use app\https\controllers\CustomerOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Authentication Routes

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// routes/web.php

Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard')
        ->middleware('role:admin');

    Route::get('/outlet/dashboard', [DashboardController::class, 'outletDashboard'])
        ->name('outlet.dashboard')
        ->middleware('role:outlet_manager');

    Route::get('/customer/dashboard', [DashboardController::class, 'customerDashboard'])
        ->name('customer.dashboard')
        ->middleware('role:customer');
    Route::get('/business/dashboard', [DashboardController::class, 'businessDashbord'])
        ->name('business.dashboard')
        ->middleware('role:business');
});
