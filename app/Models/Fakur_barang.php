<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Faktur_barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'faktur_id',
        'barang_id',
        'qty',
        'jumlah_harga',
        'HPP',
        'laba'
    ];
   
}
