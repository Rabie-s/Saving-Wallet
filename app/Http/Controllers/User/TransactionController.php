<?php

namespace App\Http\Controllers\User;


use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;

class TransactionController extends Controller
{

    public function index()
    {
        $authenticatedUser = auth()->user();
        $userTransactions = $authenticatedUser->transactions()
            ->select('id', 'type', 'amount', 'created_at')->latest()->paginate(8);
        return Inertia::render('User/Transaction/Index', ['userTransactions' => $userTransactions]);
    }

    public function createNewTransaction(StoreTransactionRequest $request)
    {
        $authenticatedUser = auth()->user();
        $wallet = $authenticatedUser->wallet;

        ['amount' => $amount, 'type' => $type] = $request->validated(); //destructuring

        //check user cannot add an expense transaction greater than the remaining balance in their wallet
        if ($type === 'expenses' && $wallet->balance < $amount) {
            return redirect()->route('user.wallet')
                ->with('message', ['message' => 'You don’t have enough money ', 'type' => 'error']);
                abort(403);
        }

        if ($type === 'income') {
            $wallet->increment('balance',$amount);
        } elseif ($type === 'expenses') {
           $wallet->decrement('balance',$amount);
        }
        $authenticatedUser->transactions()->create($request->validated());
        $wallet->save();
        return redirect()->route('user.wallet')
            ->with('message', ['message' => 'Transaction make successfully', 'type' => 'success']);
    }
}
