<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $users = User::with('transactions:type,amount,user_id','wallet:balance,user_id')
        ->select('id','name','created_at')->paginate(8);

        // computed attributes to each user (check User Model)
        $users->each(function ($user) {
            $user->append(['total_income', 'total_expenses']);
        });
        
        return Inertia::render('Admin/Index',['users'=>$users]);
    }
}
