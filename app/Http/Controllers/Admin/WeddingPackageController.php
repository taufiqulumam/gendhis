<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\WeddingPackageRequest;
use App\WeddingPackage;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WeddingPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = WeddingPackage::all();

        return view('pages.admin.wedding-package.index', [
            'packages' => $packages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.wedding-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeddingPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        WeddingPackage::create($data);
        return redirect()->route('wedding-package.index')->with('status','Paket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = WeddingPackage::findOrFail($id);

        return view('pages.admin.wedding-package.edit',
        [
            'package' =>$package
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WeddingPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $package = WeddingPackage::findOrFail($id);

        $package->update($data);

        return redirect()->route('wedding-package.index')->with('status','Paket berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // public function destroy($id)
    public function destroy(Request $request)
    {
        // $package = WeddingPackage::findOrFail($id);
        $package = WeddingPackage::findOrFail($request->id);

        $package->delete();

        // Gallery::where('wedding_packages_id', $id)->delete();
        Gallery::where('wedding_packages_id', $request->id)->delete();

        return redirect()->route('wedding-package.index')->with('status','Paket berhasil dihapus');
    }
}
