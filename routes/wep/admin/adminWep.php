<?php
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminController;

Route::get('/admin',[AdminController::class,'index'])
->middleware(['auth',AdminMiddleware::class])->name('admin.index');