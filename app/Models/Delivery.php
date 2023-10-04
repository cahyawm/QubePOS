<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = "delivery";

    // protected $fillable = [
    //     'kategori_id'
    // ];

    // public function Kategori() {
    //     return $this->belongsTo(Kategori::class, 'kategori_id');
    // }
}
