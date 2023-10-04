<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;
    protected $table = "diskon";

    protected $fillable = [
        'jenisdiskon_id'
    ];

    public function jenisDiskon() {
        return $this->belongsTo(JenisDiskon::class, 'jenisdiskon_id');
    }
}
