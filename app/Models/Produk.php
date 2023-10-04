<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    //produk
    protected $table = "produk";

    protected $fillable = [
        'nama',
        'kategori_id',
        'harga',
        'img'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function foodDelivery()
    {
        return $this->belongsTo(FoodDelivery::class);
    }

    public function orderDetail()
    {
        return $this->belongsToMany(OrderDetail::class, 'produk_id');
    }
}
