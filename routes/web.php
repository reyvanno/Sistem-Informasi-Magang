<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;
use App\Http\Controllers\ProfileController;

Route::get('/', fn () => view('welcome'));

Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    return auth()->user()->role === 'admin'
        ? redirect()->route('dashboard.admin')
        : redirect()->route('dashboard.siswa');
})->name('dashboard');

Route::middleware(['auth','admin'])->get('/dashboard/admin', function () {
    return view('dashboard-admin');
})->name('dashboard.admin');

Route::middleware(['auth','siswa'])->get('/dashboard/siswa', function () {
    return view('dashboard-siswa');
})->name('dashboard.siswa');

Route::middleware(['auth','siswa'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::resource('interns', InternController::class);
    Route::get('interns/get-divisi', [InternController::class, 'getDivisi']);
});

Route::middleware(['auth','siswa'])->prefix('siswa')->group(function () {
    Route::get('/interns', [InternController::class, 'index'])->name('siswa.interns.index');
    Route::get('/interns/{intern}', [InternController::class, 'show'])->name('siswa.interns.show');
});

require __DIR__.'/auth.php';
