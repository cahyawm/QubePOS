<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    //kategori
    protected $table = "payment";

    protected $fillable = [
        'order_id',
        'user_id',
        'metode_pembayaran',
        'total_tagihan',
        'bayar',
        'kembalian',
        'status'
    ];
}
