<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $users = User::with('transactions:type,amount,user_id','wallet:balance,user_id')
        ->select('id','name','created_at')->get();

        $users->each(function ($user) {
            // Calculate total income and expenses
            $user->total_income = $user->transactions
                ->where('type', 'income')
                ->sum('amount');
        
            $user->total_expenses = $user->transactions
                ->where('type', 'expenses')
                ->sum('amount');
        });

        
        return Inertia::render('Admin/Index',['users'=>$users]);
    }
}
