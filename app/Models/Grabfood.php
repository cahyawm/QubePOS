<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grabfood extends Model
{
    protected $table = "grabfood";
    
    public function produk() {
        return $this->hasOne(Produk::class);
    }
}
