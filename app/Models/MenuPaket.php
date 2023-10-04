<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPaket extends Model
{
    use HasFactory;

    protected $table = "menupaket";
    protected $fillable = [
        'produk1_id',
        'produk2_id',
        'produk3_id',
        'harga',
    ];

}
