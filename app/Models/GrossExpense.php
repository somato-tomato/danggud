<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrossExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaPengeluaran', 'biayaPengeluaran', 'tanggalPengeluaran','keterangan'
    ];
}
