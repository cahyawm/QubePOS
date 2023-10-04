<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokKeluar;
use App\Http\Request\StokKeluarRequest;
use PDF;

class StokKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $datas = StokMasuk::all();
        $datas = StokKeluar::where('nama_staff', 'LIKE', '%'.$keyword.'%')
            ->orWhere('catatan', 'LIKE', '%'.$keyword.'%')
            ->orWhere('penerima', 'LIKE', '%'.$keyword.'%')
            ->orWhere('harga', 'LIKE', '%'.$keyword.'%')
            // ->get();
            ->orderBy('tgl_keluar')
            ->Paginate(3);
    
        return view('pages.inventory.stokkeluar.index', [
            'datas' => $datas,
            'title' => 'inventory'
        ]);
    }

    public function cetak_pdf()
    {
        $datas = StokKeluar::orderBy('tgl_keluar')->get();
        $pdf = PDF::loadview('pages.inventory.stokkeluar.stokkeluar_pdf',[
            'datas' => $datas
        ]);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new StokKeluar;

        return view('pages.inventory.stokkeluar.create', [
            'model' => $model,
            'title' => 'inventory'
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
        $model = new StokKeluar;
        $model->nama_staff = $request->nama_staff;
        $model->catatan = $request->catatan;
        $model->tgl_keluar = $request->tgl_keluar;
        $model->harga = $request->harga;
        $model->penerima = $request ->penerima;
        $model->qty = $request->qty;

        $model->save();

        return redirect('stokkeluar');
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
        $model = StokKeluar::find($id);

        return view('pages.inventory.stokkeluar.edit', [
            'model' => $model,
            'title' => 'stokkeluar'
        ]);
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
        $model = StokKeluar::find($id);
        $model->nama_staff = $request->nama_staff;
        $model->catatan = $request->catatan;
        $model->tgl_keluar = $request->tgl_keluar;
        $model->harga = $request->harga;
        $model->penerima = $request ->penerima;
        $model->qty = $request->qty;

        $model->save();

        return redirect('stokkeluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = StokKeluar::find($id);
        $model->delete();

        return redirect('stokkeluar');
    }
}
