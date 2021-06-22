<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class lapMasuk extends Controller
{
    //
    public function index()
    {
        $stokMasuk = DB::table('goods_stocks')
        ->join('goods', 'goods_stocks.goods_id' ,'=', 'goods.id')
        ->select('goods.slug','goods.id', 'goods.namaBarang', 'goods_stocks.namaPenerima', 'goods_stocks.namaPengirim', 'goods_stocks.stokMasuk', 'goods_stocks.keterangan', 'goods_stocks.created_at')
        ->get();
        return view('laporan.lapMas',compact('stokMasuk'));
    }
}
