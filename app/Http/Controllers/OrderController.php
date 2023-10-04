<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Produk;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detailView($id)
    {
        $order = Order::find($id);
        $orderDetail = OrderDetail::where('order_id', $id)
        ->join('produk', 'produk.id', '=', 'order_detail.produk_id')
        ->get(['produk.nama', 'order_detail.order_id','order_detail.jumlah', 'order_detail.total']);

        return [
            'order' => [$order],
            'orderDetail' => $orderDetail,
        ];
    }
    
    public function index()
    {

        // get data order paid
        $paid = Order::where('status', 'paid')
        ->orderBy('created_at', 'desc')
        ->Paginate(5, ['*'], 'orders-paid');

        // get data order unpaid
        $unpaid = Order::where('status', 'unpaid')
        ->orderBy('created_at', 'desc')
        ->Paginate(5, ['*'], 'orders-unpaid');

        return view('pages.order.index', [
            'paid' => $paid,
            'unpaid' => $unpaid,
            'title' => 'order'
        ]);
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
