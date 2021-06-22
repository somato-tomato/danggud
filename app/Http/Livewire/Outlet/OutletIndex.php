<?php

namespace App\Http\Livewire\Outlet;

use App\Models\Outlet;
use Livewire\Component;
use Livewire\WithPagination;

class OutletIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'outletListener'
    ];
    public $search='';

    public function render()
    {
        return view('livewire.outlet.outlet-index',
        [
            'data' => Outlet::where('namaOutlet', 'like', '%'.$this->search.'%')->paginate(6)
        ]);
    }

    public function nonActive($id)
    {
        Outlet::where('id', $id)->update(['status' => 'nonaktif']);
    }

    public function active($id)
    {
        Outlet::where('id', $id)->update(['status' => 'aktif']);
    }

    public function getProduk($slug)
    {
        $outletSlug = Outlet::where($slug)->firstOrFail();
        $this->emit('outletSlug', $outletSlug);
    }

    public function outletListener(){}
}
