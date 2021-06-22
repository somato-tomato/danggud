<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Faktur extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'outlet_id',
        'diskon',
        'retur',
        'grandTotal',
        'namaPengirim',
        'invoice',
        'namaPenerima',
        'tanggalbuat',
        'tanggal'
    ];
 
}
