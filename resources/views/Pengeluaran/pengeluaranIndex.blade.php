<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Barang') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">PENGELUARAN KOTOR</div>
        </div>
    </x-slot>


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                 <p>Tambah Pengeluaran Kotor</p>
                </div>
                <form method="post" action="{{ route('pengeluarankotorr.store') }}" enctype="multipart/form-data" autocomplete="off">

                <div class="card-body p-0">
                    @csrf
                    <div class="form-group col-md-10">
                        <label for="namaPengeluaran">Nama Pengeluaran kotor</label>
                        <input name="namaPengeluaran" type="text" class="form-control @error('namaPengeluaran') is-invalid @enderror" id="namaPengeluaran" aria-describedby="namaPengeluaran">
                        @error('namaPengeluaran')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="biayaPengeluaran">Biaya Pengeluaran</label>
                        <input name="biayaPengeluaran" type="text" class="form-control @error('biayaPengeluaran') is-invalid @enderror" id="biayaPengeluaran" aria-describedby="biayaPengeluaran">
                        @error('biayaPengeluaran')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="tanggalPengeluaran">Tanggal Pengeluaran</label>
                        <input name="tanggalPengeluaran" type="date" class="form-control @error('tanggalPengeluaran') is-invalid @enderror" id="tanggalPengeluaran" aria-describedby="tanggalPengeluaran">
                        @error('tanggalPengeluaran')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="keterangan">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" aria-describedby="keterangan">
                        @error('keterangan')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">

                        <button type="submit" class="btn btn-info btn-sm" name="search">Submit</button>
                    </div>

                </div>
              </div>
        </form>
        </div>
        <div class="col-md-8">
            <div class="card">

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table" id="gg">
                            <thead class="text-primary">
                            <tr>
                                <th>
                                    Nama Pengeluaran
                                </th>
                                <th>
                                    Biaya Pengeluaran
                                </th>
                                <th>
                                    Tanggal Pengeluaran
                                </th>
                                <th>
                                    keterangan
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
    </div>
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                 <p>Cetak Pengeluaran Kotor</p>
                </div>
                <form method="post" action="{{ route('pengeluarankotorr.cetak') }}" enctype="multipart/form-data" autocomplete="off">

                <div class="card-body p-0">
                    @csrf

                    <div class="form-group col-md-10">
                        <label for="tanggalPengeluaran">Tanggal Pengeluaran awal</label>
                        <input name="tanggalPengeluaran" type="date" class="form-control @error('tanggalPengeluaran') is-invalid @enderror" id="tanggalPengeluaran" aria-describedby="tanggalPengeluaran">
                        @error('tanggalPengeluaran')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">
                        <label for="tanggalPengeluaranakhir">Tanggal Pengeluaran akhir</label>
                        <input name="tanggalPengeluaranakhir" type="date" class="form-control @error('tanggalPengeluaranakhir') is-invalid @enderror" id="tanggalPengeluaranakhir" aria-describedby="tanggalPengeluaran">
                        @error('tanggalPengeluaranakhir')
                        <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-10">

                        <button type="submit" class="btn btn-info btn-sm" name="cetak">cetak</button>
                    </div>

                </div>
              </div>
        </form>
        </div>
    <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
    <script>
        $(function() {
            $('#gg').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pengeluarankotorr.getList') }}',
                columns: [
                    { data: 'namaPengeluaran', name: 'namaPengeluaran' },
                    { data: 'biayaPengeluaran', name: 'biayaPengeluaran' },
                    { data: 'tanggalPengeluaran', name: 'tanggalPengeluaran' },
                    { data: 'keterangan', name: 'keterangan' },
                ]
            });
        });
    </script>
</x-app-layout>
