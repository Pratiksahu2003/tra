<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\Portfolio;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'crypto_id' => 'required|exists:cryptos,id',
            'type' => 'required|in:buy,sell',
            'quantity' => 'required|numeric|min:0.00000001',
            'price' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $crypto = Crypto::findOrFail($request->crypto_id);
            $user = Auth::user();
            $quantity = $request->quantity;
            $price = $request->price;
            $total = $quantity * $price;

            if ($request->type === 'sell') {
                $portfolio = Portfolio::where('user_id', $user->id)
                    ->where('crypto_id', $crypto->id)
                    ->first();

                if (!$portfolio || $portfolio->quantity < $quantity) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => 'Insufficient balance'
                    ], 400);
                }
            }

            Transaction::create([
                'user_id' => $user->id,
                'crypto_id' => $crypto->id,
                'type' => $request->type,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $total,
            ]);

            $portfolio = Portfolio::firstOrNew([
                'user_id' => $user->id,
                'crypto_id' => $crypto->id,
            ]);

            if ($request->type === 'buy') {
                $newQuantity = $portfolio->quantity + $quantity;
                $newTotalInvested = $portfolio->total_invested + $total;
                $newAveragePrice = $newTotalInvested / $newQuantity;

                $portfolio->quantity = $newQuantity;
                $portfolio->total_invested = $newTotalInvested;
                $portfolio->average_price = $newAveragePrice;
            } else {
                $newQuantity = $portfolio->quantity - $quantity;
                $soldValue = $quantity * $portfolio->average_price;
                $newTotalInvested = $portfolio->total_invested - $soldValue;

                if ($newQuantity > 0) {
                    $portfolio->quantity = $newQuantity;
                    $portfolio->total_invested = $newTotalInvested;
                } else {
                    $portfolio->delete();
                    DB::commit();
                    return response()->json([
                        'success' => true,
                        'message' => 'Transaction completed successfully'
                    ]);
                }
            }

            $portfolio->save();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaction completed successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Transaction failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $transactions = Transaction::with('crypto')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(20);
        
        return view('transactions.index', compact('transactions'));
    }

    public function apiIndex()
    {
        $transactions = Transaction::with('crypto')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
        
        return response()->json($transactions);
    }
}
