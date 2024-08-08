<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::controller(CategoryController::class)
    ->group(function () {
        Route::prefix('/category')->middleware(['auth', 'verified'])->group(function(){
            Route::get('/', 'category')->name('category');
            Route::post('/create', 'category_create')->name('category_create');
            Route::middleware('admin_middleware')->group(function(){
                Route::get('/delete/{category}', 'category_delete')
                    ->missing(function () {
                        throw new NotFoundHttpException('Category is not exist.');
                    });
                Route::post('/update/{category}', 'category_update')
                    ->missing(function () {
                        throw new NotFoundHttpException('Category is not exist.');
                    });
            });
            
        });
    });