<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Default pages
{
    Route::get('/about', function () {
        return view('default.about');
    })->middleware(['auth', 'verified'])->name('about');
    Route::get('/application', function () {
        return view('default.application');
    })->middleware(['auth', 'verified'])->name('application');
    Route::get('/guide', function () {
        return view('default.guide');
    })->middleware(['auth', 'verified'])->name('guide');
    Route::get('/contact', function () {
        return view('default.contact');
    })->middleware(['auth', 'verified'])->name('contact');
    Route::get('/service', function () {
        return view('default.service');
    })->middleware(['auth', 'verified'])->name('service');
}

// Handle users
{

}




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Handle Form
{
    Route::get('/form/admin', [FormController::class, 'index'])->middleware(['auth', 'verified'])->name('form.index');
    Route::get('/form/student/{id}', [FormController::class, 'indexStudent'])->middleware(['auth', 'verified'])->name('form.index.student');

    Route::post('/form/added', [FormController::class, 'add'])->middleware(['auth', 'verified'])->name('form.add');

    Route::get('/form/admin/{f_id}', [FormController::class, 'details'])->middleware(['auth', 'verified'])->name('form.details');
    Route::get('/form/student/{f_id}', [FormController::class, 'details'])->middleware(['auth', 'verified'])->name('form.detailStudent');

    Route::put('/form/admin/{f_id}/updated', [FormController::class, 'update'])->middleware(['auth', 'verified'])->name('form.update');
    Route::put('/form/student/{f_id}/updated/{id}', [FormController::class, 'updateStudent'])->middleware(['auth', 'verified'])->name('form.updateStudent');
    Route::delete('/form/{f_id}/deleted', [FormController::class, 'delete'])->middleware(['auth', 'verified'])->name('form.delete');
}

require __DIR__ . '/auth.php';
