<?php

namespace App\Http\Livewire\HargaPerJenis;

use App\Models\GoodsPrice;
use Illuminate\Support\Str;
use Livewire\Component;

class AddHargaBarang extends Component
{
    public $data;
    public $jenisOutlet;
    public $hargaJual;

    public function render()
    {
        return view('livewire.harga-per-jenis.add-harga-barang');
    }

    protected $rules = [
        'jenisOutlet' => 'required',
        'hargaJual' => 'required'
    ];

    public function store()
    {
        $this->validate();

        $outlet = GoodsPrice::updateOrCreate(
            ['goods_id' => $this->data->id, 'jenisOutlet' => $this->jenisOutlet],
            ['hargaJual' => $this->hargaJual]
        );

        $this->emit('hargaListener', $outlet);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Outlet didaftarkan!',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'center'
        ]);
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->jenisOutlet = null;
        $this->hargaJual = null;
    }
}
