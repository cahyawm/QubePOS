<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $roles = auth()->user()->role;

        $produk = Produk::count();
        $kategori = Kategori::count();
        // $order = Order::where('status', 'paid')->sum('total');
        $order = Order::sum('total');

        return view('home', [
            'title' => 'home',
            'produk' => $produk,
            'kategori' => $kategori,
            'order' => $order,
            'head_title' => 'Dashboard'
        ]);
    }
}
