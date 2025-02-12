<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/events', [UserController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('event');
    Route::post('/events/{event}', [EventController::class, 'register'])->name('register.event');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/events', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/events/create', [AdminController::class, 'create']);
    Route::post('/admin/events', [AdminController::class, 'store']);
    Route::get('/admin/events/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/events/{id}', [AdminController::class, 'update']);
    Route::delete('/admin/events/{id}', [AdminController::class, 'destroy']);
    Route::get('/admin/events/{event}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.viewUsers');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::get('/register', [AuthenticatedSessionController::class, 'create'])->name('register');
require __DIR__.'/auth.php';
