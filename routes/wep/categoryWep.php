<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CategoryController;

Route::resource('/category',CategoryController::class)->names('user.category');