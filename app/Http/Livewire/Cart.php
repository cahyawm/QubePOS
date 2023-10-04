<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Request;
use App\Models\Produk;
use App\Models\FoodDelivery;
use App\Http\Request\ProdukRequest;
use App\Models\Kategori;
use App\Models\Pajak;
use App\Models\Antri;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public $tax = "0%";
    public $discount = "0%";
    public $title = "pos";
    public $antrian = 0;
    public $category;

    // antrian
    public function mount()
    {
        if (!Cookie::has('antrian')) {
            DB::table('antrian')->delete();
            DB::statement('ALTER TABLE antrian AUTO_INCREMENT = 1');
            $id = Antri::create();
            $minute = 1440;
            $lastMinutes = 0;
            $hours = date('H:i');
            if (strpos($hours, ':') !== false) {
                // Split hours and minutes.
                list($hours, $lastMinutes) = explode(':', $hours);
            }
            $lastMinutes = $hours * 60 + $lastMinutes;
            // Menyimpan cookie hingga jam 24:00
            Cookie::queue('antrian', $this->antrian, $minute - $lastMinutes, '/');
            $this->antrian = $id->id;
        } else {
            $id = Antri::create();
            $this->antrian = $id->id;
        }
    }


    public function render()
    {
        if (!empty($this->category)) {
            if ($this->category == "delivery") {
                $datas = Produk::all();
                foreach ($datas as $key => $data) {
                    $price = FoodDelivery::where('produk_id', $data->id)->pluck('harga_delivery');
                    if ($price->count()) {
                        $data->harga = $price[0];
                        $datas[$key] = $data;
                    }
                }
            } else {
                $datas = Produk::all();
            }
        } else {
            $datas = Produk::all();
        }
        // dd("nama");
        // $datas = Produk::join('food_delivery', 'produk.id', '=', 'food_delivery.produk_id')->get();

        // $keyword = $request->keyword;

        // $datas = Produk::where('nama', 'LIKE', '%'.$keyword.'%')
        //     ->orWhere('harga', 'LIKE', '%'.$keyword.'%')
        //     ->get();

        $kategori = Kategori::all();

        // $taxname = Pajak::select('nama_pajak')->where('id', 1)->first();
        $taxname = Pajak::pluck('nama_pajak')->first();

        $this->tax = Pajak::pluck('besar_pajak')->first() . "%";

        $condition1 = new \Darryldecode\Cart\CartCondition([
            'name' => 'pajak',
            'type' => 'tax',
            'target' => 'total',
            'value' => $this->tax,
            'order' => 2

        ]);

        $condition2 = new \Darryldecode\Cart\CartCondition([
            'name' => 'diskon',
            'type' => 'tax',
            'target' => 'total',
            'value' => $this->discount,
            'order' => 1

        ]);

        \Cart::session(Auth()->id())->condition($condition1);
        \Cart::session(Auth()->id())->condition($condition2);

        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function ($cart) {
            return $cart->attributes->get('added_at');
        });

        if (\Cart::isEmpty()) {
            $cartData = [];
        } else {
            foreach ($items as $item) {

                if ($this->category == "delivery") {
                    $id = preg_replace('/\D/', '', $item->id);
                    $price = FoodDelivery::where('produk_id', $id)->pluck('harga_delivery');
                    if ($price->count()) {
                        $item->price = $price[0];
                    }
                } else {
                    $id = preg_replace('/\D/', '', $item->id);
                    $price = Produk::where('id', $id)->pluck('harga');
                    $item->price = $price[0];
                }
                $cart[] = [
                    'rowId' => $item->id,
                    'name' => $item->name,
                    'qty' => $item->quantity,
                    'pricesingle' => $item->price,
                    'price' => $item->getPriceSum(),
                ];
            }

            $cartData = collect($cart);
        }
        $subTotal = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        $newCondition = \Cart::session(Auth()->id())->getCondition('diskon');
        $diskon = $newCondition->getCalculatedValue($subTotal);

        // $subTotal1 = $subTotal->getPriceSumWithConditions();
        $newCondition1 = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $newCondition1->getCalculatedValue($subTotal - $diskon);

        $summary = [
            'subTotal' => $subTotal,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'total' => $total
        ];

        return view('livewire.cart', [
            'datas' => $datas,
            'antrian' => $this->antrian,
            'kategori' => $kategori,
            'carts' => $cartData,
            'summary' => $summary,
            'taxname' => $taxname,
            'title' => $this->title
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    public function addItem($id)
    {
        $rowId = "Cart" . $id;
        $cart = \Cart::session(Auth()->id())->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        $harga_delivery = 0;
        if ($this->category == "delivery") {
            $result =  FoodDelivery::where('produk_id', $id)->pluck('harga_delivery');
            if ($result->count())
                $harga_delivery = $result[0];
        }
        if ($cekItemId->isNotEmpty()) {
            \Cart::session(Auth()->id())->update($rowId, [
                'quantity' => [
                    'relative' => true,
                    'value' => 1
                ]
            ]);
        } else {
            $data = Produk::findOrFail($id);
            \Cart::session(Auth()->id())->add([
                'id' => "Cart" . $data->id,
                'name' => $data->nama,
                'price' =>  $harga_delivery > 0 ? $harga_delivery : $data->harga,
                'quantity' => 1,
                'attributes' => [
                    'added_at' => Carbon::now()
                ],

            ]);
        }
    }

    public function addItemDelivery($id)
    {
        $rowId = "Cart" . $id;
        $cart = \Cart::session(Auth()->id())->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        $harga_delivery =  FoodDelivery::where('produk_id', $id)->pluck('harga_delivery');

        if ($cekItemId->isNotEmpty()) {
            \Cart::session(Auth()->id())->update($rowId, [
                'quantity' => [
                    'relative' => true,
                    'value' => 1
                ]
            ]);
        } else {
            $data = Produk::findOrFail($id);
            \Cart::session(Auth()->id())->add([
                'id' => "Cart" . $data->id,
                'name' => $data->nama,
                'price' => isset($harga_delivery[0]) ? $harga_delivery[0] : $data->harga,
                'quantity' => 1,
                'attributes' => [
                    'added_at' => Carbon::now()
                ],

            ]);
        }
    }

    public function addDiscount()
    {
        // Mengecek kalau discount masih 0% tandanya button discount belum pernah diklik
        if ($this->discount == "0%") {
            // Karena belum pernah diklik maka dilakukan perubahan nilai diskon menjadi 20 %
            $this->discount = "-20%";
        }
        // Dilakukan klik lagi dan dicek ternyata data discount sudah 20% berarti sudah pernah diklik
        else {
            //Sehingga data discount diubah menjadi 0% yang menandakan remove discount
            $this->discount = "0%";
        }
    }

    public function increaseItem($rowId)
    {
        // $cart = \Cart::session(Auth()->id())->getContent();
        // $cekQty = $cart->whereIn('id', $rowId);

        \Cart::session(Auth()->id())->update($rowId, [
            'quantity' => [
                'relative' => true,
                'value' => 1
            ]
        ]);
    }

    public function decreaseItem($rowId)
    {
        $cart = \Cart::session(Auth()->id())->getContent();
        $cekItemId = $cart->whereIn('id', $rowId);
        // Mengecek jika data di cart tidak kosong maka perintah decreament bisa di eksekusi, jika tidak maka tidak ada proses yang dilakukan
        if (!$cekItemId->isEmpty() && $cekItemId[$rowId]->quantity > 1) {
            \Cart::session(Auth()->id())->update($rowId, [
                'quantity' => [
                    'relative' => true,
                    'value' => -1
                ]
            ]);
        } else {
            \Cart::session(Auth()->id())->remove($rowId);
        }

        // if(!$cekItemId->isEmpty()){
        //     if($cekItemId[$rowId]->quantity > 1){
        //         \Cart::session(Auth()->id())->update($rowId, [
        //             'quantity' => [
        //                 'relative' => true,
        //                 'value' => -1
        //             ]
        //         ]);
        //     }
        //     // else if($cekItemId[$rowId]->quantity == 0){
        //     //     return redirect()->back() ->with('alert', 'Data Telah Kosong!');
        //     // }
        //     else{
        //         \Cart::session(Auth()->id())->remove($rowId);
        //     }
        // }
    }

    public function removeAllItem()
    {
        \Cart::session(Auth()->id())->clear();
    }

    public function removeItem($rowId)
    {
        \Cart::session(Auth()->id())->remove($rowId);
    }

    public function checkout()
    {
        // Mengarahkan ke url localhost/checkout ataupun ke livewire checkout
        return redirect()->to('/checkout');
    }
}
