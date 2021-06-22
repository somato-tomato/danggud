<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Barang') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('barang.index') }}">Daftar Barang</a></div>
            <div class="breadcrumb-item"><a href="{{ route('barang.view', $data->slug) }}">Data Barang</a></div>
            <div class="breadcrumb-item active">Perbarui Barang</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Perbarui Data Barang
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('barang.update', $data->slug) }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kodeBarang">Kode Barang</label>
                                <input name="kodeBarang" value="{{ $data->kodeBarang }}" type="text" class="form-control @error('kodeBarang') is-invalid @enderror" id="kodeBarang" aria-describedby="kodeBarang">
                                @error('kodeBarang')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="namaBarang">Nama Barang</label>
                                <input name="namaBarang" value="{{ $data->namaBarang }}" type="text" class="form-control @error('namaBarang') is-invalid @enderror" id="namaBarang" aria-describedby="namaBarang">
                                @error('namaBarang')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="hargaModal">Harga Modal</label>
                                <input name="hargaModal" value="{{ $data->hargaModal }}" type="number" class="form-control @error('hargaModal') is-invalid @enderror" id="hargaModal" aria-describedby="hargaModal">
                                @error('hargaModal')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="minStok">Minimal Stok</label>
                                <input name="minStok" value="{{ $data->minStok }}" type="number" class="form-control @error('minStok') is-invalid @enderror" id="minStok" aria-describedby="minStok">
                                @error('minStok')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="satuan">Satuan</label>
                                <input name="satuan" value="{{ $data->satuan }}" type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" aria-describedby="satuan">
                                @error('satuan')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-lg">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
