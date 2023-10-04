<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //kategori
    protected $table = "order";

    protected $fillable = [
        'subtotal',
        'diskon',
        'pajak',
        'total',
        'status'
    ];

    public function orderDetail() {
        return $this->hasMany(OrderDetail::class);
    }
}
