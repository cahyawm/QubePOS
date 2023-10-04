<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDiskon extends Model
{
    use HasFactory;
    //jenis diskon
    protected $table = "jenis_diskon";

    public function diskon() {
        return $this->hasMany(Diskon::class);
    }
}
