<?php
// Ini livewire untuk halaman checkout
namespace App\Http\Livewire;

use App\Http\Livewire\Request;
use App\Models\Produk;
use App\Models\FoodDelivery;
use App\Http\Request\ProdukRequest;
use App\Models\Kategori;
use App\Models\Pajak;
use App\Models\Order;
use App\Models\OrderDetail;

use Livewire\Component;
use Carbon\Carbon;

class Checkout extends Component
{
    public $tax = "0%";
    public $discount = "0%";
    public $title = "pos";
    public $category;
    // public $namaProduk;
    // public $subTotal;
    // public $diskon = 0;
    // public $pajak;
    // public $total;
    public $status;

    public function render()
    {
        // Pada livewire Cart data telah disimpan pada session sehingga hanya perlu mengambil data dari session
        // Mengambil data Item dari session yang diurutkan berdasarkan barang yang ditambahkan paling awal
        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function ($cart) {
            return $cart->attributes->get('added_at');
        });

        // Melakukan perulangan agar bisa mengakses data pada setiap item
        foreach ($items as $item) {
            $cart[] = [
                'rowId' => $item->id,
                'name' => $item->name,
                'qty' => $item->quantity,
                'pricesingle' => $item->price,
                'price' => $item->getPriceSum(),
            ];
            // menyimpan data item pada array cart
        }

        // Mengkonversi tipe data Cart dari array menjadi collection / object
        $cartData = collect($cart);
        // Mengambil nilai subtotal dari session
        $subTotal = \Cart::session(Auth()->id())->getSubTotal();
        // Mengambil nilai total dari session
        $total = \Cart::session(Auth()->id())->getTotal();

        // Mengambil nilai diskon dari session
        $newCondition = \Cart::session(Auth()->id())->getCondition('diskon');
        $diskon = $newCondition->getCalculatedValue($subTotal);

        // Mengambil nilai pajak dari session
        $newCondition1 = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $newCondition1->getCalculatedValue($subTotal - $diskon);

        $summary = [
            'subTotal' => $subTotal,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'total' => $total
        ];

        return view('livewire.checkout', [
            'carts' => $cartData,
            'summary' => $summary,
        ])->extends('layouts.app')
            ->section('content');
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
    }

    public function removeItem($rowId)
    {
        \Cart::session(Auth()->id())->remove($rowId);
    }

    public function saveOrder($value)
    {

        $this->status = $value;

        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function ($cart) {
            return $cart->attributes->get('added_at');
        });

        $subTotal = \Cart::session(Auth()->id())->getSubTotal();
        $total = \Cart::session(Auth()->id())->getTotal();

        $newCondition = \Cart::session(Auth()->id())->getCondition('diskon');
        $diskon = $newCondition->getCalculatedValue($subTotal);

        $newCondition1 = \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak = $newCondition1->getCalculatedValue($subTotal - $diskon);

        $order = Order::create([
            'subtotal' => $subTotal,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'total' =>  $total,
            'status' => $this->status,
        ]);

        foreach ($items as $item) {
            preg_match('/\d+/',  $item->id, $produk_id);
            OrderDetail::create([
                'order_id' =>  $order->id,
                'produk_id' =>  $produk_id[0],
                'jumlah' => $item->quantity,
                'total' =>  $item->quantity * $item->price
            ]);
            \Cart::session(Auth()->id())->remove($item->id);
        }

        if ($this->status == "unpaid") {
            session()->flash('success', 'Pesanan berhasil disimpan');
            return redirect()->to('/cart');
        } else {
            return redirect()->to('/payment/' . $order->id);
        }
    }
}
