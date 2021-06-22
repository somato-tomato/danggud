<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Daftar Stok Masuk') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Stok Masuk</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="card col-md-10">
            <div class="card-body">
                <form method="post" action="{{ route('stokMasuk.store') }}" autocomplete="off">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="namaPengirim">Nama Pengirim</label>
                            <input name="namaPengirim" type="text" class="form-control @error('namaPengirim') is-invalid @enderror" id="namaPengirim" aria-describedby="namaPengirim">
                            @error('namaPengirim')
                            <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="namaPenerima">Nama Penerima</label>
                            <input name="namaPenerima" type="text" class="form-control @error('namaPenerima') is-invalid @enderror" id="namaPenerima" aria-describedby="namaPenerima">
                            @error('namaPenerima')
                            <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Barang</label>
                            <select name="goods_id" class="form-control ok">
                                <option selected> -- Pilih Barang -- </option>
                                @foreach ($goods as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="stokMasuk">Stok Masuk</label>
                            <input name="stokMasuk" type="text" class="form-control @error('stokMasuk') is-invalid @enderror" id="stokMasuk" aria-describedby="stokMasuk">
                            @error('stokMasuk')
                            <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" aria-describedby="keterangan"></textarea>
                        @error('keterangan')
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
        <div class="card col-md-10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="supplierTable">
                        <thead class="text-primary">
                        <tr>
                            <th>
                                Nama Barang
                            </th>
                            <th>
                                Stok Masuk
                            </th>
                            <th>
                                Pengirim
                            </th>
                            <th>
                                Pengirim
                            </th>
                            <th>
                                Keterangan
                            </th>
                            <th>
                                Dibuat
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
    <script>
        $(function() {
            $('#supplierTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('stokMasuk.getList') }}',
                columnDefs: [
                    { orderable: false, targets: [4, 6] } , // Disable search on first and last columns
                    { className: 'text-center', targets: [6] }
                ],
                columns: [
                    { data: 'namaBarang', name: 'namaBarang' },
                    { data: 'stokMasuk', name: 'stokMasuk' },
                    { data: 'namaPengirim', name: 'namaPengirim' },
                    { data: 'namaPenerima', name: 'namaPenerima' },
                    { data: 'keterangan', name: 'keterangan' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'lihat', name: 'lihat' }
                ]
            });
        });
    </script>
</x-app-layout>
{{--<script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>--}}


