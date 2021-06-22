<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_id', 'namaPengirim', 'namaPenerima', 'stokMasuk', 'keterangan', 'users_id'
    ];
}
