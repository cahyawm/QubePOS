<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $table = "pajak";

    protected $fillable = [
        'nama_pajak',
        'besar_pajak',
        'biaya_layanan'
    ];
}
