<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //kategori
    protected $table = "kategori";

    protected $fillable = [
        'nama',
    ];

    public function produk() {
        return $this->hasMany(Produk::class);
    }
}
