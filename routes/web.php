<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// View
Route::get('/', [StudentsController::class, 'myWelcomeView'])->name('std.myWelcomeView');

// Create
Route::post('/create', [StudentsController::class, 'createNewStd'])->name('std.createNew');

Route::put('/update/{id}', [StudentsController::class, 'updateStd'])->name('std.update');

Route::delete('/delete/{id}', [StudentsController::class, 'deleteStd'])->name('std.delete');