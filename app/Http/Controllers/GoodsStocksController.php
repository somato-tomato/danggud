<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\GoodsStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GoodsStocksController extends Controller
{
    public function dashboard()
    {
        $outlet = DB::select("   select count(namaOutlet) as nama from outlets");
        return view('dashboard');
    }
    public function index()
    {
        return view('barang.stokDex');
    }

    public function getGoodsStocks()
    {
        return Datatables::of(Goods::query())
            ->addColumn('lihat', function($data) {
                if ($data->stok <= $data->minStok)
                {
                    return "<div class='badge badge-pill badge-danger mb-1'>DANGER</div>";
                } else {
                    return "<div class='badge badge-pill badge-success mb-1'>SAFE</div>";
                }
            })
            ->rawColumns(['lihat'])
            ->make(true);
    }

    public function indexStockIn()
    {
        $getGoods = Goods::all();
        $goods = $getGoods->pluck('namaBarang', 'id');

        return view('barang.stokInDex', compact('goods'));
    }

    public function getStockIn()
    {
        $stokMasuk = DB::table('goods_stocks')
            ->join('goods', 'goods_stocks.goods_id' ,'=', 'goods.id')
            ->select('goods.slug', 'goods.namaBarang', 'goods_stocks.namaPenerima', 'goods_stocks.namaPengirim', 'goods_stocks.stokMasuk', 'goods_stocks.keterangan', 'goods_stocks.created_at')
            ->get();

        return Datatables::of($stokMasuk)
            ->addColumn('lihat', function($data) {
                return "<a class='btn btn-sm btn-info' href='".route('barang.view', $data->slug)."'>Lihat</a>";
            })
            ->rawColumns(['lihat'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaPenerima' => 'required',
            'namaPengirim' => 'required',
            'goods_id' => 'required',
            'stokMasuk' => 'required|min:1'
        ]);

        $form_data = array(
            'namaPenerima' => $request->namaPenerima,
            'namaPengirim' => $request->namaPengirim,
            'goods_id' => $request->goods_id,
            'stokMasuk' => $request->stokMasuk,
            'keterangan' => $request->keterangan,
            'users_id' => Auth::user()->getAuthIdentifier()
        );

        $cekStokAwal = DB::table('goods')
            ->select('stok', 'slug', 'namaBarang')
            ->where('id', '=', $request->goods_id)
            ->first();

        if ($cekStokAwal->stok === 0)
        {
            Alert::html('Silahkan isi Stok Awal Terlebih dahulu!',"<a style='font-size: 25px' type='btn' class='btn btn-warning btn-lg' href='".route('barang.view', $cekStokAwal->slug)."'>$cekStokAwal->namaBarang</a>",'error')->autoClose(100000);
            return back();
        } else {
            GoodsStock::create($form_data);
            DB::table('goods')
                ->where('id', '=', $request->goods_id)
                ->increment('stok', $request->stokMasuk);
            toast('Stok berhasil ditambahkan!','success')->position('top-end');
            return back();
        }
    }

    public function indexStockLow()
    {
        return view('barang.stokLowDex');
    }

    public function getStockLow()
    {
        $stokLow = DB::table('goods')
            ->join('goods_stocks', 'goods.id', '=', 'goods_stocks.goods_id')
            ->select('goods.slug', 'goods.namaBarang', 'goods.stok', 'goods.minStok', 'goods_stocks.created_at', 'goods_stocks.stokMasuk')
            ->whereColumn('goods.stok', '<=', 'goods.minStok')
            ->whereRaw('goods_stocks.created_at in (select max(goods_stocks.created_at) from goods_stocks group by (goods_stocks.goods_id))')
            ->get();

        return Datatables::of($stokLow)
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? with(new Carbon($data->created_at))->format('d/m/Y') : '';
            })
//            ->addColumn('lihat', function($data) {
//                return "<a class='btn btn-sm btn-info' href='".route('barang.view', $data->slug)."'>Lihat</a>";
//            })
            ->addColumn('tambah', function() {
                return "<a class='btn btn-sm btn-success' href='".route('stokMasuk.index')."'>Tambah</a>";
            })
            ->rawColumns([ 'tambah', 'created_at'])
            ->make(true);
    }

}
