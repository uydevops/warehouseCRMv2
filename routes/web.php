<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\InvoicesController;
use App\Http\Middleware\AuthMiddleware;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
});

Route::group(['middleware' => AuthMiddleware::class], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('/settings', [DashboardController::class, 'updateSettings'])->name('settings.update');

    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::post('/users/update', [UsersController::class, 'updateUser'])->name('users.update');
    Route::get('/users/delete/{id}', [UsersController::class, 'deleteUser'])->name('users.delete');
    Route::post('/users/add', [UsersController::class, 'addUser'])->name('users.add');


    Route::get('/masalar', [DashboardController::class, 'tables'])->name('tables');
    Route::post('/masalar/add', [TablesController::class, 'add'])->name('tables.add');
    Route::get('/masalar/delete/{id}', [TablesController::class, 'delete'])->name('tables.delete');
    Route::post('/tables/{id}', [TablesController::class, 'update'])->name('tables.update');


    Route::get('/rezervasyonlar', [DashboardController::class, 'reservations'])->name('reservations');

    Route::get('/empty-table', [ReservationsController::class, 'emptyTable'])->name('empty-table');
    Route::get('/reserved-table', [ReservationsController::class, 'reservedTable'])->name('reserved-table');
    Route::post('/reservations/add', [ReservationsController::class, 'add'])->name('reserve-table');
    Route::post('/reservations/release', [ReservationsController::class, 'release'])->name('release-table');

    //feedback

    Route::get('/feedback', [DashboardController::class, 'feedback'])->name('feedbacks');


    Route::get('/employees', [DashboardController::class, 'employees'])->name('employees');
    Route::post('/employees/add', [EmployeesController::class, 'add'])->name('employees.add');
    Route::post('/employees/update', [EmployeesController::class, 'update'])->name('employees.update');
    Route::get('/employees/delete/{id}', [EmployeesController::class, 'delete'])->name('employees.delete');


    ///invoices
    Route::get('/invoices', [DashboardController::class, 'invoices'])->name('invoices');
    Route::post('/invoices/add', [InvoicesController::class, 'add'])->name('invoices.add');
    Route::post('/invoices/update', [InvoicesController::class, 'update'])->name('invoices.update');
    Route::get('/invoices/delete/{id}', [InvoicesController::class, 'delete'])->name('invoices.delete');

    




    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
