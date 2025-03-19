<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTransactionRequest;

class TransactionController extends Controller
{
    public function createNewTransaction(StoreTransactionRequest $request)
    {
        $authenticatedUser = Auth::user();
        $wallet = $authenticatedUser->wallet;

        $amount = $request->validated('amount');
        $type = $request->validated('type');


        if ($type === 'expenses' && $wallet->balance < $amount) {
            return redirect()->route('user.wallet')
                ->with('message', ['message' => 'You don’t have enough money ', 'type' => 'error']);
        }

        if ($type === 'income') {
            $wallet->balance += $request->amount;
        } elseif ($type === 'expenses') {
            $wallet->balance -= $request->amount;
        }
        $authenticatedUser->transactions()->create($request->validated());
        $wallet->save();
        return redirect()->route('user.wallet')
            ->with('message', ['message' => 'Transaction make successfully', 'type' => 'success']);
    }
}
