<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Transaction;
use App\TransactionDetail;
use App\WeddingPackage;
use App\WeddingDate;

use Carbon\Carbon; //library format tanggal

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $email = auth()->user()->email;

        $date = WeddingDate::where([["email", $email], ["transactions_id", $id]])->first();
        


        $item = Transaction::with(['details', 'wedding_package', 'user'])->findOrFail($id);

        
        if(!empty($date->wedding_date)) {
            $date = "ilang";
        } else {
            $date = "tampil";
        }

        return view('pages.checkout', [
            'item' => $item,
            'date' => $date
        ]);
    }

    public function process(Request $request, $id)
    {
        $wedding_package = WeddingPackage::findOrFail($id);

        $transaction = Transaction::create([
            'wedding_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'transaction_total' => $wedding_package->price,
            'transaction_status' => 'IN_CART'
        ]);
        

        // TransactionDetail::create([
        //     'transactions_id' => $transaction->id,
        //     'name' => Auth::user()->name,
        //     'email' => Auth::user()->email,
        //     'phone_number' => Auth::user()->phone_number,
        //     'wedding_date' => Carbon::now()
        // ]);

        
        return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id)
    {
        // $data = $request->all();
        // $data['transactions_id'] = $id;

        // TransactionDetail::create($data);

        $transaction = Transaction::find($id);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone_number' => Auth::user()->phone_number,
            'wedding_date' => $request->wedding_date
        ]);

        $transaction = Transaction::with(['wedding_package'])->find($id);

        $transaction->transaction_total = $transaction->wedding_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id)->with('submit', false);


        // return redirect()->route('checkout_process', $id)->with('submit', false);
    }

    public function success(Request $request, $id)
    {   
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }
}
