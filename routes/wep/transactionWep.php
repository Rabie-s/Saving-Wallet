<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TransactionController;

Route::post('createNewTransaction',[TransactionController::class,'createNewTransaction'])
->name('user.createNewTransaction');

Route::get('/transactions',[TransactionController::class,'index'])
    ->name('user.transaction.index');