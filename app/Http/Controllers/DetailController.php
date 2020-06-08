<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeddingPackage;

class DetailController extends Controller
{
    public function index(Request $request, $slug) 
    {
        $package = WeddingPackage::with(['galleries'])->where('slug', $slug)->firstOrFail();
        return view ('pages.detail',[
            'package' => $package
        ]);
    }
}
