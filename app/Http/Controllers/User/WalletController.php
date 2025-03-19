<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $authenticatedUser = Auth::user();

        $wallet = $authenticatedUser->wallet()->first();
        $walletBalance = $wallet->balance;

        $userTransactions = $authenticatedUser->transactions()
            ->select('id', 'type', 'amount', 'created_at')->latest()->paginate(5);


        $totalIncome = $authenticatedUser->transactions()->where('type', 'income')->sum('amount');
        $totalExpenses = $authenticatedUser->transactions()->where('type', 'expenses')->sum('amount');


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
