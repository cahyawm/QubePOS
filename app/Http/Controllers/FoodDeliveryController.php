<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodDelivery;
use App\Models\Produk;

class FoodDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getDeliveryPrice(Request $request)
    {
        $deliveryPrice = FoodDelivery::where('produk_id', $request->id)->get();
        $response = [
            'success' => true,
            'data' => $deliveryPrice ? $deliveryPrice : null,
        ];
        return response()->json($response, 200);
    }

    public function index()
    {
        $datas = FoodDelivery::all();

        return view('pages.delivery.grabfood.index', [
            'datas' => $datas,
            'title' => 'delivery',
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
        return view('pages.delivery.grabfood.create', [
            'produk' => $produk,
            'title' => 'delivery',
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
            'produk_id' => 'unique:food_delivery,produk_id'
        ]);
        FoodDelivery::create([
            'produk_id' => $request->produk_id,
            'harga_delivery' => $request->harga_delivery,
        ]);

        return redirect('grabfood');
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
        $model = FoodDelivery::find($id);
        $produk = Produk::all();

        return view('pages.delivery.grabfood.edit',[
            'model' => $model,
            'produk' => $produk,
            'title' => 'delivery',

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
        $model = FoodDelivery::find($id);
        $model->produk_id = $request->produk_id;
        $model->harga_delivery = $request->harga_delivery;

        $model->save();

        return redirect('grabfood');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = FoodDelivery::find($id);
        $model->delete();

        return redirect('grabfood');
    }
}
