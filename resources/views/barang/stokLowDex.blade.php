<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Stok Barang') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Stok Barang</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body p-0" style="margin-top: 15px; margin-left: 15px; margin-right: 15px; margin-bottom: 10px">
                    <div class="table-responsive">
                        <table class="table" id="supplierTable">
                            <thead class="text-primary">
                            <tr>
                                <th>
                                    Nama Barang
                                </th>
                                <th>
                                    Stok Tersedia
                                </th>
                                <th>
                                    Minimal Stok
                                </th>
                                <th>
                                    Stok Masuk Terakhir
                                </th>
                                <th>
                                    Tanggal Stok Masuk Terakhir
                                </th>
                                <th class="text-center"></th>
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
    <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
    <script>
        $(function() {
            $('#supplierTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('stokKurang.getList') }}',
                columns: [
                    { data: 'namaBarang', name: 'namaBarang' },
                    { data: 'stok', name: 'stok' },
                    { data: 'minStok', name: 'minStok' },
                    { data: 'stokMasuk', name: 'stokMasuk' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'tambah', name: 'tambah' },
                    // { data: [['lihat'], ['tambah']], name: [['lihat'], ['tambah']] }
                ]
            });
        });
    </script>
</x-app-layout>
