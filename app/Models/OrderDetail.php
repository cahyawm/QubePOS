<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    //produk
    protected $table = "order_detail";

    protected $fillable = [
        'order_id',
        'produk_id',
        'jumlah',
        'total'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'id');
    }
}
