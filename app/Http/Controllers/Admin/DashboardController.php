<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WeddingPackage;
use App\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'wedding_package' => WeddingPackage::count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'items' => Transaction::with(['details', 'wedding_package', 'user'])->orderBy('id', 'desc')->take(5)->get()

        ]);
    }
}
