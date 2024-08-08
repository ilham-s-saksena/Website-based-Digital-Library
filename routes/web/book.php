<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::controller(BookController::class)
    ->group(function () {
        Route::prefix('/book')->middleware(['auth', 'verified'])->group(function(){
            Route::get('/', 'book')->name('book');
            Route::post('/create', 'book_create')->name('book_create');
            Route::get('/delete/{book}', 'book_delete')
                ->missing(function () {
                    throw new NotFoundHttpException('Book is not exist.');
                });
            Route::post('/update/{book}', 'book_update')
                ->missing(function () {
                    throw new NotFoundHttpException('Book is not exist.');
                });
        });
    });