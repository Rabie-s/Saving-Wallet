<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\WalletController;

Route::get('wallet',[WalletController::class,'index'])->name('user.wallet');
