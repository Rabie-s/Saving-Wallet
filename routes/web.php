<?php


use Illuminate\Support\Facades\Route;


require __DIR__ . '/wep/userAuth.php';
require __DIR__ . '/wep/homeWep.php';
Route::prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        require __DIR__ . '/wep/walletWep.php';
        require __DIR__ . '/wep/categoryWep.php';
        require __DIR__ . '/wep/transactionWep.php';
    });
});


//admin
require __DIR__ . '/wep/admin/adminWep.php';

