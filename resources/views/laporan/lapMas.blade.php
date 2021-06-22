<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Barang') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Laporan STOK MASUK</div>
        </div>
    </x-slot>
    
        
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><strong>Tambah Laporan STOK MASUK</strong></h3>
                    {{-- <form  action="{{ route('laporan.index') }}" method="POST" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="row">
                        <div class="form-group">
                            <select class="form-control form-control-sm ok" name="jenisOutlet" id="jenisOutlet">
                                <option value="" selected=""> -- Nama BARANG --</option>
                                @foreach ($stokMasuk as $outlet)
                                <option value="{{$outlet->id}}">{{$outlet->namaBarang}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                        <input type="checkbox" id="sitem" name="sitem"   style="width: 30px;height: 30px;"  ><span>ALL</span>
                           
                        </div>
                    </div>
                        <div class="form-group">
                            <label>tanggal awal</label>
                            <input type="date" name="awal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>tanggal akhir</label>
                            <input type="date" name="akhir" class="form-control">
                        </div>
                       
                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-sm" name="search">Submit</button>
                            <button type="submit" class="btn btn-warning btn-sm" name="exportPDF">export PDF</button>
                       
                        </div>
                    </form>
                </div>
            </div>
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
