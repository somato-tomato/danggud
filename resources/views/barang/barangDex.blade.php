<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Barang') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Daftar Barang</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a type="button" href="{{ route('barang.create') }}" class="btn btn-sm btn-info ">Tambah Barang</a>
                </div>
                <div class="card-body p-0">
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
                                    Harga
                                </th>
                                <th>
                                    Satuan
                                </th>
                                <th>
                                    Aksi
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
    <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
    <script>
        $(function() {
            $('#supplierTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('barang.getList') }}',
                columns: [
                    { data: 'kodeBarang', name: 'kodeBarang' },
                    { data: 'namaBarang', name: 'namaBarang' },
                    { data: 'hargaModal', name: 'hargaModal' },
                    { data: 'satuan', name: 'satuan' },
                    { data: 'lihat', name: 'lihat' }
                ]
            });
        });
    </script>
</x-app-layout>
