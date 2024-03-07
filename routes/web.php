<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\StudentController;

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/post', function () {
//     return view('post');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
