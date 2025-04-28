<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route — where we can show user-specific data
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');  // You can later update this to show reports or other data
})->name('dashboard');

// Profile routes (no change here)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Report routes (good, no change)
Route::middleware(['auth'])->group(function () {
    Route::get('/report', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::get('/dashboard/reports', [ReportController::class, 'index'])->name('report.index');
});
Route::get('/dashboard/reports', [ReportController::class, 'index'])->name('report.index');

require __DIR__.'/auth.php';
