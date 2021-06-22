<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Outlet') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('outlet.index') }}">Daftar Outlet</a></div>
            <div class="breadcrumb-item"><a href="{{ route('outlet.view', $data->slug) }}">Data Outlet</a></div>
            <div class="breadcrumb-item active">Perbarui Outlet</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Perbarui Data Outlet
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('outlet.update', $data->id) }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kodeOutlet">Kode Barang</label>
                                <input name="kodeOutlet" value="{{ $data->kodeOutlet }}" type="text" class="form-control @error('kodeOutlet') is-invalid @enderror" id="kodeOutlet" aria-describedby="kodeOutlet">
                                @error('kodeOutlet')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="namaOutlet">Nama Outlet</label>
                                <input name="namaOutlet" value="{{ $data->namaOutlet }}" type="text" class="form-control @error('namaOutlet') is-invalid @enderror" id="namaOutlet" aria-describedby="namaOutlet">
                                @error('namaOutlet')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="alamat">Alamat</label>
                                <input name="alamat" value="{{ $data->alamat }}" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" aria-describedby="alamat">
                                @error('alamat')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telepon">Telepon</label>
                                <input name="telepon" value="{{ $data->telepon }}" type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon" aria-describedby="telepon">
                                @error('telepon')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="jenisOutlet">Jenis Outlet</label>
                                <select id="jenisOutlet" name="jenisOutlet" class="form-control">
                                    <option value="{{ $data->jenisOutlet }}">{{ $data->jenisOutlet }}</option>
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
