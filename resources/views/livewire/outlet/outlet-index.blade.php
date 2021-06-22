<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4" style="margin-bottom: 10px">
                    <input wire:model="search" class="form-control form-control-sm" placeholder="Cari Nama Outlet">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Kode Outlet</th>
                        <th scope="col">Nama Outlet</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody wire:loading.class="opacity-50">
                    @forelse( $data as $d )
                        <tr>
                            <td>{{ $d->kodeOutlet }}</td>
                            <td>{{ $d->namaOutlet }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td>0{{ $d->telepon }}</td>
                            <td class="text-center">
                                @if( $d->status === 'aktif')
                                    <button wire:click="$emit('nonActive',{{ $d->id }})" class="btn btn-success btn-sm">Aktif</button>
                                @else
                                    <button wire:click="$emit('active',{{ $d->id }})" class="btn btn-warning btn-sm">Nonaktif</button>
                                @endif
                            </td>
                            <td>
                                <a type="button" href="{{ route('outlet.view', $d->slug) }}" class="btn btn-sm btn-info">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="flex justify-content-center align-items-center">
                                    <span>Nama Outlet Tidak Ditemukan</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        @this.on('nonActive', outlet => {
            Swal.fire({
                title: 'Nonaktifkan Outlet ?',
                text: "Outlet tidak akan bisa dipilih",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Nonaktif !',
                cancelButtonText: 'Tidak Yakin !',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    @this.call('nonActive',outlet)
                    Swal.fire(
                        'Outlet nonaktif !',
                        'Outlet berhasil di nonaktifkan.',
                        'success'
                    )
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Dibatalkan',
                        'Outlet tidak di nonaktifkan',
                        'success'
                    )
                }
            });
        })
    })
    document.addEventListener('livewire:load', function () {
    @this.on('active', outlet => {
        Swal.fire({
            title: 'Aktifkan Outlet ?',
            text: "Outlet dapat di pilih kembali",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Aktifkan !',
            cancelButtonText: 'Tidak Yakin!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
            @this.call('active',outlet)
                Swal.fire(
                    'Outlet Aktif !',
                    'Outlet berhasil di aktifkan',
                    'success'
                )
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Outlet tidak di aktifkan',
                    'error'
                )
            }
        });
    })
    })
</script>
