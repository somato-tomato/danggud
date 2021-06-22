<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Barang') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('barang.index') }}">Daftar Barang</a></div>
            <div class="breadcrumb-item active">Data Barang</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="h2">
                        {{ $data->namaBarang }} - {{ $data->kodeBarang }}
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="h5 mt-4">
                                Harga Modal : @currency($data->hargaModal)
                            </div>
                            <div class="h5 mt-4">
                                Satuan : {{ $data->satuan }}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="h5 mt-4">
                                Minimal Stok : {{ $data->minStok }}
                            </div>
                            <div class="h5 mt-4">
                                @if( $data->stok === 0)
                                    Stok : <strong style="color: red">Stok Kosong</strong>
                                @elseif( $data->stok <= $data->minStok)
                                    Stok : <strong style="color: red">{{ $data->stok }}</strong>
                                    <div class="font-weight-600 text-small" style="color: red"><strong>Segera stok ulang barang!</strong></div>
                                @else
                                    Stok : {{ $data->stok }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-info" href="{{ route('barang.edit', $data->slug) }}">Perbarui</a>
                    </div>
                </div>
            
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Harga Modal</th>
                                <th scope="col">Tanggal di Perbarui</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $goodPriceHistory as $h )
                                <tr>
                                    <td class="h5">
                                        {{ $h->hargaModal }}
                                    </td>
                                    <td class="h5">
                                        {{ $h->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if($data->stok === 0)
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('barang.fStock') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div hidden class="form-group">
                                <label for="goods_id">goods_id</label>
                                <input name="goods_id" value="{{ $data->id }}" type="text" class="form-control @error('goods_id') is-invalid @enderror" id="goods_id" aria-describedby="goods_id">
                                @error('goods_id')
                                <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="keterangan">Keterangan</label>
                                    <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" aria-describedby="keterangan">
                                    @error('keterangan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="stokAwal">Stok Awal</label>
                                    <input name="stokAwal" type="number" class="form-control @error('stokAwal') is-invalid @enderror" id="stokAwal" aria-describedby="stokAwal">
                                    @error('stokAwal')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-info" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
            @endif
            <div class="card">
                <div class="card-body">
                    <livewire:harga-per-jenis.add-harga-barang :data="$data" />
                </div>
            </div>
            <div class="card">
                @if($data->stok === 0)
                @else
                    <div class="card-header">
                        Stok Awal : {{ $stokAwal->stokAwal }} | Tanggal Masuk : {{ $stokAwal->created_at }}
                    </div>
                @endif
                <div class="card-body">
                    <livewire:harga-per-jenis.list-harga-barang :data="$data"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
