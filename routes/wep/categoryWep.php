<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CategoryController;

Route::resource('/category', CategoryController::class)
    ->only(['index', 'destroy', 'store'])->names('user.category');
