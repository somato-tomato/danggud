<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Outlet') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('outlet.index') }}">Daftar Outlet</a></div>
            <div class="breadcrumb-item active">Data Outlet</div>
        </div>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="h2">
                        {{ $data->kodeOutlet }}
                    </div>
                    <hr/>
                    <div class="h5 mt-4">
                        Nama Outlet : {{ $data->namaOutlet }}
                    </div>
                    <div class="h5 mt-4">
                        Alamat : {{ $data->alamat }}
                    </div>
                    <div class="h5 mt-4 mb-4">
                        Telepon : 0{{ $data->telepon }}
                    </div>
                    <div class="text-center">
                        <a class="btn btn-info" href="{{ route('outlet.edit', $data->slug) }}">Perbarui</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-hover" id="fakturTable">
                            <thead>
                            <tr>
                                <th scope="col">Nomor Invoice</th>
                                <th scope="col">Grand Total</th>
{{--                                <th scope="col"></th>--}}
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
            $('#fakturTable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 3,
                ajax: '{{ route('outlet.gf', $data->id) }}',
                columns: [
                    { data: 'invoice', name: 'invoice' },
                    { data: 'grandTotal', name: 'grandTotal' }
                ]
            });
        });
    </script>
</x-app-layout>
