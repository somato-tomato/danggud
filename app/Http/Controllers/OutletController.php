<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;


class OutletController extends Controller
{
    public function index()
    {
        return view('outlet.outletDex');
    }

    public function getFakturs($id)
    {
        $fakturs = DB::table('fakturs')
            ->join('outlets', 'fakturs.outlet_id', '=', 'outlets.id')
            ->select('fakturs.slug', 'fakturs.invoice', 'fakturs.grandTotal')
            ->where('outlets.id', '=', $id)
            ->get();

        return Datatables::of($fakturs)
//            ->editColumn('hargaModal', function ($harga){
//                return "Rp. ".number_format($harga->hargaModal, 0, ',', '.')."";
//            })
//            ->addColumn('lihat', function($data) {
//                return "<a class='btn btn-sm btn-info' href='".route('barang.view', $data->slug)."'>Lihat</a>";
//            })
//            ->rawColumns(['lihat'])
            ->make();
    }

    public function view($slug)
    {
        $data = DB::table('outlets')
            ->where('slug', '=', $slug)
            ->first();

        return view('outlet.outletView', compact('data'));
    }

    public function outletEdit($slug)
    {
        $data = DB::table('outlets')
            ->where('slug', '=', $slug)
            ->first();

        return view('outlet.outletEdit', compact('data'));
    }

    public function updateOutlet(Request $request, $id)
    {
        $form_data = array(
            'slug' => Str::kebab($request->namaOutlet).'-'.Str::random(10),
            'kodeOutlet' => $request->kodeOutlet,
            'namaOutlet' => $request->namaOutlet,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenisOutlet' => $request->jenisOutlet
        );

        Outlet::where('id', $id)->update($form_data);
        $slugNew = DB::table('outlets')->select('slug', 'id')->where('id', '=', $id)->first();

        toast('Outlet berhasil di perbarui!','success')->position('top-end');
        return redirect()->route('outlet.view', $slugNew->slug);
    }
}
