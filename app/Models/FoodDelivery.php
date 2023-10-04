<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDelivery extends Model
{
    use HasFactory;
    protected $table = "food_delivery";

    protected $fillable = [
        'produk_id',
        'harga_delivery',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
