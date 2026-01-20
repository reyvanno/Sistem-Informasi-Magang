<?php

use App\Http\Controllers\InternController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes for admin only
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('interns', InternController::class);
    Route::get('interns/get-divisi', [InternController::class, 'getDivisi'])->name('interns.getDivisi');
});

// Routes for siswa only (view only)
Route::middleware(['auth', 'siswa'])->prefix('siswa')->group(function () {
    Route::get('/interns', [InternController::class, 'index'])->name('siswa.interns.index');
    Route::get('/interns/{intern}', [InternController::class, 'show'])->name('siswa.interns.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';