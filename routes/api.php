<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('product')
     ->name('product.')
     ->group(function () {
         Route::get('list', [ProductController::class, 'list'])
              ->name('list');
         Route::get('show/{id}', [ProductController::class, 'show'])
              ->name('show')
              ->whereNumber('id');
         Route::post('/', [ProductController::class, 'create'])
              ->name('create');
         Route::put('update', [ProductController::class, 'update'])
              ->name('update');
         Route::delete('{id}', [ProductController::class, 'delete'])
              ->name('delete')
              ->whereNumber('id');
     });
