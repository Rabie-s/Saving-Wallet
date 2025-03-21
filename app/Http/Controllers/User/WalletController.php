<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Category;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    public function index()
    {
        $authenticatedUser = auth()->user();

        $wallet = $authenticatedUser->wallet()->first();
        $walletBalance = $wallet->balance;

        $userTransactions = $authenticatedUser->transactions()
            ->select('id', 'type', 'amount', 'created_at')->latest()->limit(5)->get();

        $totalIncome = $authenticatedUser->transactions()->where('type', 'income')->sum('amount');//get total income for user
        $totalExpenses = $authenticatedUser->transactions()->where('type', 'expenses')->sum('amount');//get total expenses for user


        // Fetch public and user privet categories
        $categories = Category::whereNull('user_id')
            ->orWhere('user_id', $authenticatedUser->id)
            ->get();

        return Inertia::render('User/Wallet/Index', [
            'walletBalance' => $walletBalance,
            'categories' => $categories,
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'userTransactions' => $userTransactions
        ]);
    }
}
