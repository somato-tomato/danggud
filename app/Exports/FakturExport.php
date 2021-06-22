<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;



class FakturExport implements FromCollection
{
  
protected $id;

function __construct($id) {
       $this->id = $id;
}

    public function collection()
    {
        //
        //   $data = DB::table('outlets')->join('fakturs','fakturs.outlet_id','=','outlets.id')
        // ->join('faktur_barangs','faktur_barangs.faktur_id','=','fakturs.invoice')
        // ->join('goods','goods.id','=','faktur_barangs.idBarang')
        // ->select('outlets.namaOutlet','fakturs.invoice','fakturs.grandTotal','faktur_barangs.laba','faktur_barangs.HPP','fakturs.id','fakturs.tanggal','fakturs.diskon')
        // ->where('fakturs.id','=',$this->id)->first();

        //    $databarang = DB::select("SELECT goods.namaBarang,goods.satuan,faktur_barangs.qty,goods_prices.hargaJual,faktur_barangs.jumlah_harga FROM fakturs 
        //    JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
        //    JOIN goods ON goods.id = faktur_barangs.idBarang 
        //     JOIN goods_prices ON goods_prices.goods_id = goods.id  WHERE fakturs.id='$this->id' GROUP BY faktur_barangs.id");
        
        //     return view('faktur.fakturView',[
        //         'data' => $data,
        //         'databarang' => $databarang
        //     ]);
        return User::all();
    }
}
