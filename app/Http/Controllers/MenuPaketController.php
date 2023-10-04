<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MenuPaket;
use App\Models\Produk;

class MenuPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = MenuPaket::all();

        return view('pages.katalog.paket.index', [
            'title' => 'katalog',
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();

        return view('pages.katalog.paket.create', [
            'produk' => $produk,
            'title' => 'katalog',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk1_id' => 'required',
            'produk2_id' => 'required',
            'harga' => 'required|numeric',
        ]);

        Produk::create([
            'produk1_id' => $request->produk1_id,
            'produk2_id' => $request->produk2_id,
            'produk3_id' => $request->produk3_id,
            'harga' => $request->harga,
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
