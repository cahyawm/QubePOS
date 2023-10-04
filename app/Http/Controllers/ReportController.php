<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qty_terjual = 0;
        $total_terjual = 0;
        // get total transaksi per metode
        $data['total'] = DB::table('payment')
            ->select(DB::raw('sum(total_tagihan) as total'))
            ->groupBy('metode_pembayaran')
            ->get();

        // get data laporan
        $data['result_order'] = DB::table('payment')
            ->select('payment.metode_pembayaran', DB::raw('sum(d.jumlah) as qty'))
            ->join('order', 'payment.order_id', '=', 'order.id')
            ->join('order_detail as d', 'order.id', '=', 'd.order_id')
            ->groupBy('payment.metode_pembayaran')
            ->get();
        foreach( $data['result_order'] as $key => $val){

            $qty_terjual += $val->qty;
            $total_terjual += $data['total'][$key]->total;
        };
        // dd( $total_terjual);
        $data['ringkasan_order'] = [
            'qty' => $qty_terjual,
            'total' => $total_terjual
        ];
        // get data laporan menu
        $data['result_menu'] = DB::table('order')
            ->select('produk.nama', 'd.produk_id', DB::raw('sum(d.jumlah) as qty'), DB::raw('sum(d.total) as total_penjualan'))
            ->join('order_detail as d', 'order.id', '=', 'd.order_id')
            ->join('produk', 'd.produk_id', '=', 'produk.id')
            ->groupBy('produk.id')
            ->where('order.status', '=', 'paid')
            ->get();
        
            $qty_terjual = 0;
            $total_terjual = 0;
        
            foreach( $data['result_menu'] as $key => $val){
                $qty_terjual += $val->qty;
                $total_terjual += $val->total_penjualan;
            };
            // dd( $total_terjual);
            $data['ringkasan_menu'] = [
                'qty' => $qty_terjual,
                'total' => $total_terjual
            ];
        // title sidebar
        $data['title'] = 'report';

        return view('pages.laporan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
