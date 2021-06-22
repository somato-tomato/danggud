<?php

namespace App\Http\Livewire;

use App\Models\Outlet;
use Livewire\Component;

class Faktur extends Component
{
    public function render()
    {
        $selectOutlet = Outlet::all();
        return view('livewire..Faktur', ['outlet' => $selectOutlet,]);
    }
}
