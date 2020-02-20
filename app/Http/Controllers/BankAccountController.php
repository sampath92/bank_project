<?php

namespace App\Http\Controllers;

use App\Services\Account\BankAccountFactory;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'account_type' => 'required',
            'customer_id' => 'required',
            'branch_id' => 'required'
        ]);

        try {

            $account = BankAccountFactory::init($request->input('account_type'));
            $account->setCustomer($request->input('customer_id'));
            $account->setBranchId($request->input('branch_id'));
            $account->setAccountBalance(2500);
            $response = $account->commit();

            return response()->json($response, 200);

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $account = BankAccountFactory::init($request->input('type'));
            return response()->json($account, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
