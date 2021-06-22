<?php

namespace App\Http\Controllers;

use App\Models\GrossExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\PDF;
use Illuminate\Support\Facades\App;

class PengeluaranKotorrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Pengeluaran.pengeluaranIndex');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'namaPengeluaran' => 'required',
            'biayaPengeluaran' => 'required|numeric|min:2|max:10',
            'keterangan' => 'required',
            'tanggalPengeluaran' => 'required'
        ]);
        $form_data = array(
            'namaPengeluaran' => $request->namaPengeluaran,
            'biayaPengeluaran' => $request->biayaPengeluaran,
            'keterangan' => $request->keterangan,
            'tanggalPengeluaran' => $request->tanggalPengeluaran
        );

        GrossExpense::create($form_data);

        toast('data pengeluaran kotor ditambahkan!','success')->position('top-end');
        return redirect()->route('pengeluarankotorr.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = GrossExpense::findOrFail($id);
        $data->delete();
    }
    public function getGoods1()
    {
        $data = GrossExpense::latest()->get();
        return DataTables::of(GrossExpense::query())
        ->addColumn('lihat', function($data) {
            return "<a class='btn btn-sm btn-info' href='".route('pengeluarankotorr.index', $data->slug)."'>Lihat</a>";
        })
        ->rawColumns(['lihat'])
        ->make(true);
    }
    public function cetak(Request $req)
    {

        $akhir = $req->input('tanggalPengeluaranakhir');
        $awal = $req->input('tanggalPengeluaran');
        if($req->has('cetak')){
            $ViewsPage = DB::select("SELECT * from gross_expenses where tanggalPengeluaran between  '$awal' and '$akhir'");
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('Pengeluaran.cetak',compact('ViewsPage'));
            return $pdf->download('pengeluaran.pdf');
             }
    }
}
