<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('crypto')
            ->where('user_id', Auth::id())
            ->get();
        
        return view('portfolio.index', compact('portfolios'));
    }

    public function apiIndex()
    {
        $portfolios = Portfolio::with('crypto')
            ->where('user_id', Auth::id())
            ->get();
        
        return response()->json($portfolios);
    }
}
