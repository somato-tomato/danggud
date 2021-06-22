<div>
    {{-- Do your work, then step back. --}}
    <h3 class="card-title"><strong>Tambah Harga Jual</strong></h3>
    <form wire:submit.prevent="store" autocomplete="off">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Jenis Outlet</label>
                <select class="form-control form-control-sm @error('jenisOutlet') is-invalid @enderror" wire:model="jenisOutlet">
                    <option value="" selected=""> -- Jenis Outlet --</option>
                    <option value="ramen">Ramen</option>
                    <option value="nasiGoreng">Nasi Goreng</option>
                    <option value="martabak">Martabak</option>
                    <option value="kopi">Kopi</option>
                </select>
                @error('jenisOutlet')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="hargaJual">Harga Jual</label>
                <input wire:model="hargaJual" type="number" class="form-control @error('hargaJual') is-invalid @enderror" id="hargaJual" aria-describedby="hargaJual">
                @error('hargaJual')
                <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-info btn-sm">Submit</button>
        </div>
    </form>
</div>
