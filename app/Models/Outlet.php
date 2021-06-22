<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeOutlet','slug', 'namaOutlet', 'alamat', 'telepon', 'status', 'jenisOutlet'
    ];
}
