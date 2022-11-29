<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\KategoriChild;
use Illuminate\Http\Request;

class KategoriChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::where('app_type', '<=', env('APP_TYPE'))->get();
        return view('admin.kategorichild.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KategoriChild::create([
            'child_name' => $request->name,
            'kategori_id' => $request->kategori
        ]);
        return redirect()->route('adminpage.kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriChild  $kategoriChild
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriChild $kategoriChild)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriChild  $kategoriChild
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriChild $kategoriChild)
    {
        $kategoris = Kategori::where('app_type', '<=', env('APP_TYPE'))->get();
        return view('admin.kategorichild.edit', compact('kategoriChild', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriChild  $kategoriChild
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriChild $kategoriChild)
    {
        $kategoriChild->update([
            'child_name' => $request->name,
            'kategori_id' => $request->kategori
        ]);
        return redirect()->route('adminpage.kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriChild  $kategoriChild
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriChild $kategoriChild)
    {
        $kategoriChild->delete();
        return redirect()->route('adminpage.kategori.index');
    }
}
