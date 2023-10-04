<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $method = $request->method;
        $id = $request->id;
        $datas = Order::find($id);
        // $detail = OrderDetail::find(['order_detail_id' => $id]);
        $detail = DB::table('order_detail')
            ->join('produk', 'produk.id', '=', 'order_detail.produk_id')
            ->select('order_detail.*', 'produk.*')
            ->where('order_detail.order_id', '=', $id)
            ->get();
        // dd($detail);
        // foreach ($detail->produk as $index => $item) {
        //     dd($item->toArray());
        // }
        // die();
        if ($method == 'cash') {
            return view('pages.cashier.cash', [
                'id' => $id,
                'title' => 'cash - payment',
                'order' => $datas,
                'detail' => $detail
            ]);
        } else {
            dd("salah");
        }
        // $datas = Pajak::find(1);
    }

    public function pay(Request $request)
    {
        $method = "cash";
        $id_order = $request->id;
        $id_user = $request->session()->get('user');
        $bayar = $request->bayar;
        // dd($id_user);
        $datas = Order::find($id_order);
        $kembalian = $bayar - $datas->total;
        Payment::create([
            'order_id' => $id_order,
            'user_id' => $id_user,
            'metode_pembayaran' => 'cash',
            'total_tagihan' => $datas->total,
            'bayar' => $bayar,
            'kembalian' => $kembalian,
            'status' => 1
        ]);

        session()->flash('success', 'Pesanan berhasil dibayar');
        return redirect()->to('/cart');
        // dd($kembalian);
        // $detail = OrderDetail::find(['order_detail_id' => $id]);
        // $detail = DB::table('order_detail')
        //     ->join('produk', 'produk.id', '=', 'order_detail.produk_id')
        //     ->select('order_detail.*', 'produk.*')
        //     ->where('order_detail.order_id', '=', $id)
        //     ->get();
        // dd($detail);
        // foreach ($detail->produk as $index => $item) {
        //     dd($item->toArray());
        // }
        // die();

        // $datas = Pajak::find(1);
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
        $datas = Payment::find(1);

        return view('pages.pajak.index', [
            'data' => $datas,
            'title' => 'tax'
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
        $datas = Payment::find(1);

        $datas->nama_pajak = $request->nama_pajak;
        $datas->besar_pajak = $request->besar_pajak;
        $datas->biaya_layanan = $request->biaya_layanan;

        $datas->save();
        return redirect('pajak');
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
