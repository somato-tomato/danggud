<?php

namespace App\Http\Controllers;

use App\Exports\FakturExport;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class FakturController extends Controller
{
    public function index()

    {
        $AWAL = 'ADS';
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
       $noUrutAkhir = DB::table('fakturs')->max('id');
       $no = 1;
       if(date('d') === 1) {
           $ok= "" . sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
       }
       else {
           $ok= "" . sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
       }

        $selectOutlet = Outlet::pluck('namaOutlet', 'id');
        return view('faktur.fakturDex', ['outlet' => $selectOutlet,]);
    }


    public function getOutlet($id)
    {
        $all = new Outlet();

        $outlet = $all->where('id', $id)->get();

        return response()->json($outlet);
    }

    public function getJenis()
    {
        $goodsPrice = DB::table('goods_prices')
        ->join('goods', 'goods_prices.goods_id' ,'=', 'goods.id')
        ->get();

        return response()->json($goodsPrice);
    }

    public function getStok($id)
    {
        $goods= DB::table('goods')->where('id', '=', $id)->get();

        return response()->json($goods[0]);
    }

    public function getGoods($goodsId)
    {
        // $goods = DB::table('goods')
        // ->join('goods', 'goods_prices.goods_id' ,'=', 'goods.id')
        // ->where('id', '=', $goodsId)->get();


        $goods = DB::select("SELECT * FROM goods_prices JOIN goods ON goods.id = goods_prices.goods_id where goods.id = '$goodsId' and goods.stok >= goods.minStok ");
        return response()->json($goods);
    }



    public function create(Request $request)
    {

      return view('faktur.fakturDex');
    }


    public function store(Request $request){
        $kodeFaktur = $request->data['head'][0]['kodeFaktur'];
        $outletId = $request->data['head'][0]['outlet'];
        $idd = $request->data['head'][0]['id'];
        $diskon = $request->data['head'][0]['diskon'];
        $grandTotal = $request->data['head'][0]['grandTotal'];
        $tanggal = $request->data['head'][0]['tanggal'];

        // insert fakturs
       $ok= DB::table('fakturs')->insert([
            'id' =>$idd,
            'diskon' =>$diskon,
            'grandTotal' =>$grandTotal,
            'tanggal' =>$tanggal,
            'slug' => Str::kebab(auth()->user()->name).'-'.Str::random(10),
            'namaPengirim' => auth()->user()->name,
            'invoice' => $kodeFaktur,
            'outlet_id' => $outletId
        ]);



        foreach($request->data['detailData'] as $data){
            DB::table('faktur_barangs')->insert([
                'faktur_id' =>  $idd,
                'idBarang' => $data['id'],
                'qty' => $data['qty'],
                'jumlah_harga' => $data['namaBarang'],
                'HPP' => $data['totalmodal'],
                'laba' => $data['laba']
            ]);


        }
        foreach($request->data['detailData'] as $data){

            DB::table('goods')->where('id','=',$data['id'])->decrement('stok',$data['qty']);
        }


    //     $data = DB::select("SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id,fakturs.tanggal,fakturs.diskon  FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
    //     JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
    //     JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.id= '$idd' order by fakturs.created_at asc");
    //     //  $ddd= $data[0]['grandTotal'];
    //     // $dd=ter($data['grandTotal'],'rupiah','senilai'); // one million
    //     $databarang = DB::select("SELECT goods.namaBarang,goods.satuan,faktur_barangs.qty,faktur_barangs.jumlah_harga,(faktur_barangs.qty*faktur_barangs.jumlah_harga) AS total FROM fakturs
    //     JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
    //     JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.id= ' $idd'");
    // //    return  view('laporan.fakturCetak',compact('data','databarang'));

    //    $pdf = App::make('snappy.pdf.wrapper');
    //              $pdf->loadView('laporan.fakturCetak',compact('data','databarang'));
    //               $pdf->download('faktur.pdf');


     }
     public function faktur(Request $request)
     {

        $idd = $request->oks;

        // $data = DB::select("SELECT outlets.namaOutlet,fakturs.invoice,fakturs.grandTotal,faktur_barangs.laba,faktur_barangs.HPP,fakturs.id,fakturs.tanggal,fakturs.diskon  FROM outlets JOIN fakturs ON fakturs.outlet_id = outlets.id
        //  JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
        //  JOIN goods ON goods.id = faktur_barangs.idBarang where fakturs.id= '$idd' order by fakturs.created_at asc");
         $data = DB::table('outlets')->join('fakturs','fakturs.outlet_id','=','outlets.id')
         ->join('faktur_barangs','faktur_barangs.faktur_id','=','fakturs.invoice')
         ->join('goods','goods.id','=','faktur_barangs.idBarang')
         ->select('outlets.namaOutlet','fakturs.invoice','fakturs.grandTotal','faktur_barangs.laba','faktur_barangs.HPP','fakturs.id','fakturs.tanggal','fakturs.diskon')
         ->where('fakturs.id','=',$idd)->first();

            $databarang = DB::select("  SELECT goods.namaBarang,goods.satuan,faktur_barangs.qty,goods_prices.hargaJual,faktur_barangs.jumlah_harga FROM fakturs
            JOIN faktur_barangs ON faktur_barangs.faktur_id = fakturs.invoice
            JOIN goods ON goods.id = faktur_barangs.idBarang
             JOIN goods_prices ON goods_prices.goods_id = goods.id  WHERE fakturs.id='$idd' GROUP BY faktur_barangs.id");

        //  return view('faktur.fakturView',compact('data','databarang'));
        //    $pdf = App::make('dompdf.wrapper');
        //              $pdf->loadView('faktur.fakturView',compact('data','databarang'));
        //              return $pdf->download('faktur.pdf');
                    // $path = public_path('pdf/');
                    // $fileName = time().'.'.'pdf';
                    // $pdf->save($path.'pdf/'.$fileName);
                    // return response()->download($pdf);
        // return view('faktur.fakturView',compact('data','databarang'));

       $pdf = App::make('dompdf.wrapper');
                 $pdf->loadView('faktur.fakturView',compact('data','databarang'))->setPaper('a5', 'landscape');

                 return $pdf->download('faktur.pdf');


    //    $pdf = App::make('snappy.pdf.wrapper');
    //    $pdf->loadView('faktur.fakturView',compact('data','databarang'));
    //    return $pdf->download('faktur.pdf');
    //    return  view('faktur.fakturView',compact('data','databarang'));
                //  $pdf = PDF::loadView('faktur.fakturView',compact('data','databarang'));
                //  PDF::loadView('faktur.fakturView',compact('data','databarang')->setWarnings(false)->save('myfile.pdf');
                //  PDF::loadView('faktur.fakturView',compact('data','databarang'))->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');
                //  return $pdf->download('faktur.pdf');



     }

     public function excel ()
     {

        return Excel::download(new FakturExport(), 'users.xlsx');


     }

}
