<?php

namespace App\Http\Livewire\Outlet;

use App\Models\Outlet;
use Illuminate\Support\Str;
use Livewire\Component;

class OutletStore extends Component
{
    public $kodeOutlet;
    public $namaOutlet;
    public $alamat;
    public $telepon;
    public $jenisOutlet;

    protected $rules = [
        'namaOutlet' => 'required|unique:outlets',
        'alamat' => 'required',
    ];


    public function render()
    {
        return view('livewire.outlet.outlet-store');
    }

    public function store()
    {
        $this->validate();

        $outlet = Outlet::create([
            'slug' => Str::slug($this->namaOutlet).'-'.Str::random(5),
            'kodeOutlet' => $this->kodeOutlet,
            'namaOutlet' => $this->namaOutlet,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'jenisOutlet' => $this->jenisOutlet
        ]);

        $this->emit('outletListener', $outlet);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Outlet didaftarkan!',
            'timer'=>3000,
            'icon'=>'success',
//            'toast'=>true,
            'position'=>'center'
        ]);
        $this->resetInput();
    }

    private function resetInput()
    {
        
        $this->kodeOutlet = null;
        $this->namaOutlet = null;
        $this->alamat = null;
        $this->telepon = null;
        $this->jenisOutlet = null;
    }

}
