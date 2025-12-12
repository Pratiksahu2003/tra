<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\Portfolio;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $portfolios = Portfolio::with('crypto')
            ->where('user_id', $user->id)
            ->get();
        
        $totalValue = 0;
        $totalInvested = 0;
        
        foreach ($portfolios as $portfolio) {
            $currentValue = $portfolio->quantity * $portfolio->crypto->price;
            $totalValue += $currentValue;
            $totalInvested += $portfolio->total_invested;
        }
        
        $profitLoss = $totalValue - $totalInvested;
        $profitLossPercent = $totalInvested > 0 ? ($profitLoss / $totalInvested) * 100 : 0;
        
        $recentTransactions = Transaction::with('crypto')
            ->where('user_id', $user->id)
            ->latest()
            ->take(10)
            ->get();
        
        $topCryptos = Crypto::orderBy('volume_24h', 'desc')->take(10)->get();
        
        return view('dashboard', compact(
            'portfolios',
            'totalValue',
            'totalInvested',
            'profitLoss',
            'profitLossPercent',
            'recentTransactions',
            'topCryptos'
        ));
    }
}
