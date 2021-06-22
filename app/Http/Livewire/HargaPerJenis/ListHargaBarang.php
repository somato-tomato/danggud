<?php

namespace App\Http\Livewire\HargaPerJenis;

use App\Models\GoodsPrice;
use Livewire\Component;

class ListHargaBarang extends Component
{
    public $data;
    protected $listeners = [
        'hargaListener'
    ];

    public function render()
    {
        return view('livewire.harga-per-jenis.list-harga-barang',[
            'listHarga' => GoodsPrice::where('goods_id', '=', $this->data->id)->get()
        ]);
    }

    public function hargaListener(){}
}
