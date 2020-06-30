<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeddingPackage;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $packages = WeddingPackage::all();
        return view('pages.home', [
            'packages' => $packages
        ]);
    }
}
