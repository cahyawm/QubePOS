<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokMasuk;
use App\Http\Request\StokMasukRequest;
use PDF;

class StokMasukController extends Controller
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
        $datas = StokMasuk::where('nama_staff', 'LIKE', '%'.$keyword.'%')
            ->orWhere('catatan', 'LIKE', '%'.$keyword.'%')
            ->orWhere('penerima', 'LIKE', '%'.$keyword.'%')
            ->orWhere('harga', 'LIKE', '%'.$keyword.'%')
            ->orderBy('tgl_masuk')
            // ->get();
            ->Paginate(5);
    
        return view('pages.inventory.stokmasuk.index', [
            'datas' => $datas,
            'title' => 'inventory'
        ]);
    }

    public function cetak_pdf($tglawal, $tglakhir)
    {
        $cetakPertanggal = StokMasuk::whereBetween('tgl_masuk', [$tglawal, $tglakhir])->orderBy('tgl_masuk')->get();
    	// $datas = StokMasuk::all();
    	$pdf = PDF::loadview('pages.inventory.stokmasuk.stokmasuk_pdf',[
            'cetakPertanggal' => $cetakPertanggal
        ]);
        // dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir :".$tglakhir);
        return $pdf->stream();
        // return $pdf->download('laporan-stokmasuk-pdf');
        return view('pages.inventory.stokmasuk.stokmasuk_pdf', [
            'cetakPertanggal' => $cetakPertanggal,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ]);
    }

    // public function cetak_pdf()
    // {
    // 	$datas = StokMasuk::orderBy('tgl_masuk')->get();

    //     $total = StokMasuk::sum('harga');
    //     $totalQty = StokMasuk::count();

    // 	$pdf = PDF::loadview('pages.inventory.stokmasuk.stokmasuk_pdf',[
    //         'datas' => $datas,
    //         'total' => $total,
    //         'totalQty' => $totalQty
    //     ]);
    //     return $pdf->stream();
    //     // return $pdf->download('laporan-stokmasuk-pdf');
    // }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new StokMasuk;

        return view('pages.inventory.stokmasuk.create', [
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
        $model = new StokMasuk;
        $model->nama_staff = $request->nama_staff;
        $model->catatan = $request->catatan;
        $model->tgl_masuk = $request->tgl_masuk;
        $model->harga = $request->harga;
        $model->penerima = $request ->penerima;
        $model->qty = $request->qty;

        $model->save();

        return redirect('stokmasuk');
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
        $model = StokMasuk::find($id);

        return view('pages.inventory.stokmasuk.edit', [
            'model' => $model,
            'title' => 'stokmasuk'
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
        $model = StokMasuk::find($id);
        $model->nama_staff = $request->nama_staff;
        $model->catatan = $request->catatan;
        $model->tgl_masuk = $request->tgl_masuk;
        $model->harga = $request->harga;
        $model->penerima = $request ->penerima;
        $model->qty = $request->qty;

        $model->save();

        return redirect('stokmasuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = StokMasuk::find($id);
        $model->delete();

        return redirect('stokmasuk');
    }
}
