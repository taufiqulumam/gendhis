<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weddingpackage;

class NavbarController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $packages = WeddingPackage::all();
        return view('pages.detail', [
            'packages' => $packages
        ]);

        // return view('pages.detail', $packages);

        // $package = WeddingPackage::with(['galleries'])->where('slug', $slug)->firstOrFail();
        // return view ('pages.detail',[
        //     'package' => $package
        // ]);
    }
}
