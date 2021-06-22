<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Tambah Outlet</strong></h3>
            <form wire:submit.prevent="store" autocomplete="off">
                <div class="form-group">
                    <label for="namaOutlet">Kode Outlet</label>
                    <input wire:model="kodeOutlet" type="text" class="form-control @error('kodeOutlet') is-invalid @enderror" id="kodeOutlet" aria-describedby="kodeOutlet">
                    @error('kodeOutlet')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaOutlet">Nama Outlet</label>
                    <input wire:model="namaOutlet" type="text" class="form-control @error('namaOutlet') is-invalid @enderror" id="namaOutlet" aria-describedby="namaOutlet">
                    @error('namaOutlet')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Outlet</label>
                    <select class="form-control form-control-sm" wire:model="jenisOutlet">
                        <option value="" selected=""> -- Jenis Outlet --</option>
                        <option value="ramen">Ramen</option>
                        <option value="nasiGoreng">Nasi Goreng</option>
                        <option value="martabak">Martabak</option>
                        <option value="kopi">Kopi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea wire:model="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" aria-describedby="alamat"></textarea>
                    @error('alamat')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input wire:model="telepon" type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon" aria-describedby="telepon  ">
                    @error('telepon')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
