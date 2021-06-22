<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Stok Barang') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Stok Barang</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a type="button" href="{{ route('laporan.cetakall') }}" class="btn btn-sm btn-info ">Cetak Barang Stok all</a> 
                    <a type="button" href="{{ route('laporan.cetakdanger') }}" class="btn btn-sm btn-danger ">Cetak Barang Stok Danger</a>
                    <a type="button" href="{{ route('laporan.cetaksafe') }}" class="btn btn-sm btn-success ">Cetak Barang Stok Safe</a>
          
                </div>
                <div class="card-body p-0" style="margin-top: 15px; margin-left: 15px; margin-right: 15px; margin-bottom: 10px">
                    <div class="table-responsive">
                        <table class="table" id="supplierTable">
                            <thead class="text-primary">
                            <tr>
                                <th>
                                    Kode Barang
                                </th>
                                <th>
                                    Nama Barang
                                </th>
                                <th>
                                    Stok Tersedia
                                </th>
                                <th>
                                    Minimal Stok
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
                ajax: '{{ route('stok.getList') }}',
                columnDefs: [
                    { orderable: false, targets: [4] } , // Disable search on first and last columns
                    { className: 'text-center', targets: [4] }
                ],
                columns: [
                    { data: 'kodeBarang', name: 'kodeBarang' },
                    { data: 'namaBarang', name: 'namaBarang' },
                    { data: 'stok', name: 'stok' },
                    { data: 'minStok', name: 'minStok' },
                    { data: 'lihat', name: 'lihat' }
                ]
            });
        });
    </script>
</x-app-layout>
