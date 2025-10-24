<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Store a newly created transaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out',
            'note' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Start a database transaction
            return \DB::transaction(function () use ($request) {
                // Create the transaction
                $transaction = Transaction::create([
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'type' => $request->type,
                    'note' => $request->note,
                    'user_id' => Auth::id(),
                ]);

                // Update inventory based on transaction type
                $inventory = Inventory::firstOrNew(['product_id' => $request->product_id]);

                if ($request->type === 'in') {
                    $inventory->quantity = ($inventory->quantity ?? 0) + $request->quantity;
                } else {
                    // Check if there's enough stock for 'out' transactions
                    if (($inventory->quantity ?? 0) < $request->quantity) {
                        throw new \Exception('Insufficient stock for this transaction');
                    }
                    $inventory->quantity -= $request->quantity;
                }

                $inventory->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Transaction created successfully',
                    'data' => $transaction->load('product'),
                    'inventory' => [
                        'product_id' => $inventory->product_id,
                        'new_quantity' => $inventory->quantity
                    ]
                ], 201);
            });
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create transaction',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
