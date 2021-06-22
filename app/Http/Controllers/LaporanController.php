<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Barryvdh\Snappy\PdfWrapper;
use App\Http\Controllers\PDF;
class LaporanController extends Controller
{
    //

    public function index(Request $req)
    {

        $goods = DB::table('outlets')->get();

        $from = $req->input('jenisOutlet');
        $awal = $req->input('awal');
        $akhir = $req->input('akhir');
        $cek = $req->input('sitem');
            $to   = $req->input('periode');
            if ($req->has('search'))
            {
                if($cek){
                    $ViewsPage = DB::select("SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                    JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                    JOIN goods ON goods.id = faktur_barangs.idBarang where  fakturs.tanggal between  '$awal' and '$akhir'");

                    return view('laporan.laporanView',compact('ViewsPage'), ['outlet' => $goods]);

                }else{
                    $ViewsPage = DB::select("SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                    JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                    JOIN goods ON goods.id = faktur_barangs.idBarang where namaOutlet='$from' and fakturs.tanggal between  '$awal' and '$akhir'");

                    return view('laporan.laporanView',compact('ViewsPage'), ['outlet' => $goods]);

                }
                // select search


            }elseif ($req->has('exportPDF'))
            {
                if($cek){
                    $PDFReport = DB::select("SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.tanggal between  '$awal' and '$akhir'");

                    $jumlah = DB::select("Select SUM(fakturs.`grandTotal`) AS jum FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.tanggal between  '$awal' and '$akhir'");

                    $pdf = App::make('dompdf.wrapper');
                 $pdf->loadView('laporan.o',compact('PDFReport','awal','akhir','jumlah'));
                 return $pdf->download('invoice.pdf');
                }else{
                    $PDFReport = DB::select("SELECT  outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                    JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                    JOIN goods ON goods.id = faktur_barangs.idBarang where namaOutlet='$from' and fakturs.tanggal between  '$awal' and '$akhir'");

                    $jumlah = DB::select("SELECT  SUM(fakturs.`grandTotal`) AS jum FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
                    JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
                    JOIN goods ON goods.id = faktur_barangs.idBarang where namaOutlet='$from' and fakturs.tanggal between  '$awal' and '$akhir'");

                    $pdf = App::make('dompdf.wrapper');
                     $pdf->loadView('laporan.o',compact('PDFReport','awal','akhir','jumlah'));

                     return $pdf->download('invoice.pdf');


                }
                // select PDF

                // $pdf = PDF::loadView('PDF_report', ['PDFReport' => $PDFReport])->setPaper('a4', 'landscape');
                // return $pdf->download('PDF-report.pdf');
            }
        else
        {
            $ViewsPage = DB::select('SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
            JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
            JOIN goods ON goods.id = faktur_barangs.idBarang order by fakturs.created_at asc');

            return view('laporan.laporanView',compact('ViewsPage'), ['outlet' => $goods]);
            }
    }

    public function update($id)
    {
        $ViewsPage = DB::select('SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
        JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
        JOIN goods ON goods.id = faktur_barangs.idBarang order by fakturs.created_at asc');

        $goods = DB::table('outlets')->get();

        $data = DB::select("SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id,fakturs.tanggal,fakturs.diskon  FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
        JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
        JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.id= '$id' order by fakturs.created_at asc");
        //  $ddd= $data[0]['grandTotal'];
        // $dd=ter($data['grandTotal'],'rupiah','senilai'); // one million
        $databarang = DB::select("SELECT goods.namaBarang,goods.satuan,faktur_barangs.qty,faktur_barangs.jumlah_harga,(faktur_barangs.qty*faktur_barangs.jumlah_harga) AS total FROM fakturs
        JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
        JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.id= '$id'");
        // ddd($data);
    //    $pdf = App::make('snappy.pdf.wrapper');
    //    $pdf->loadView('laporan.kwitansi',compact('data','databarang'));

        view('laporan.kwitansi',compact('data','databarang'));
    }
     public function cetak($id){
        $ViewsPage = DB::select('SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
        JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
        JOIN goods ON goods.id = faktur_barangs.idBarang order by fakturs.created_at asc');

        $goods = DB::table('outlets')->get();

        $data = DB::table('outlets')->join('fakturs','fakturs.outlet_id','=','outlets.id')
         ->join('faktur_barangs','faktur_barangs.faktur_id','=','fakturs.invoice')
         ->join('goods','goods.id','=','faktur_barangs.idBarang')
         ->select('outlets.namaOutlet','fakturs.invoice','fakturs.grandTotal','faktur_barangs.laba','faktur_barangs.HPP','fakturs.id','fakturs.tanggal','fakturs.diskon')
         ->where('fakturs.id','=',$id)->first();

            $databarang = DB::select("  SELECT goods.namaBarang,goods.satuan,faktur_barangs.qty,goods_prices.hargaJual,faktur_barangs.jumlah_harga FROM fakturs
            JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
            JOIN goods ON goods.id = faktur_barangs.idBarang
             JOIN goods_prices ON goods_prices.goods_id = goods.id  WHERE fakturs.id='$id' GROUP BY faktur_barangs.id");
    //    return  view('laporan.fakturCetak',compact('data','databarang'));

       $pdf = App::make('dompdf.wrapper');
                 $pdf->loadView('laporan.fakturCetak',compact('data','databarang'));
                 return $pdf->download('faktur.pdf');

     }
     public function cetakall()
     {
        $stokall = DB::table('goods')
        ->select('kodeBarang','namaBarang','stok','minStok')
        ->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('barang.barangstokAll',compact('stokall'));
        return $pdf->download('stok.pdf');
     }
     public function cetakdanger()
     {
        $stokall = DB::table('goods')
        ->select('kodeBarang','namaBarang','stok','minStok')
        ->whereRaw('stok<= minStok')
        ->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('barang.barangstokDanger',compact('stokall'));
        return $pdf->download('stokdanger.pdf');
     }
     public function cetaksafe()
     {
        $stokall = DB::table('goods')
        ->select('kodeBarang','namaBarang','stok','minStok')
        ->whereRaw('stok>= minStok')
        ->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('barang.barangstokSafe',compact('stokall'));
        return $pdf->download('stoksafe.pdf');
     }

}
