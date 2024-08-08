<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

Route::controller(MainController::class)
    ->group(function () {
        Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function(){
            Route::get('/', 'dashboard')->name('dashboard');
        });
        Route::prefix('/view')->group(function () {
            Route::get('/file/{filename}', 'file');
            Route::get('/cover/{filename}', 'cover');
        });
        
    });

    Route::get('/books/export', function () {
        return Excel::download(new BooksExport, 'books.xlsx');
    })->name('books.export')->middleware(['auth', 'verified']);