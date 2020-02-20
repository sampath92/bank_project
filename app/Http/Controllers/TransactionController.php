<?php

namespace App\Http\Controllers;

use App\Services\Transaction\Transaction;
use App\Services\Transaction\TransactionFactory;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function createTransaction(Request $request)
    {

        $request->validate([
            'account_number' => 'required',
            'transaction_amount' => 'required',
            'transaction_type' => 'required',
            'action_type' => 'required'
        ]);

        try {
            $account_number = $request->input('account_number');
            $transaction_type = $request->input('transaction_type');
            $action_type = $request->input('action_type');
            $transaction_amount = $request->input('transaction_amount');

            $transaction = TransactionFactory::init($transaction_type);
            $transaction->setActionType($action_type);
            $transaction->setActionType($action_type);
            $transaction->setAccountNumber($account_number);
            $transaction->setAmount($transaction_amount);
            $transaction->commit();

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }
}
