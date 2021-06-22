<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsFirstStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_id', 'keterangan', 'stokAwal'
    ];
}
