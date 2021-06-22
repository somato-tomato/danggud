<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Jenis Outlet</th>
                <th scope="col">Harga Jual</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $listHarga as $h )
                <tr>
                    <td class="h5">
                        @if( $h->jenisOutlet === 'ramen')
                            Ramen
                        @elseif( $h->jenisOutlet === 'nasiGoreng')
                            Nasi Goreng
                        @elseif( $h->jenisOutlet === 'kopi')
                            Kopi
                        @else
                            Martabak
                        @endif
                    </td>
                    <td class="h5">
                        @currency($h->hargaJual)
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="flex justify-content-center align-items-center">
                            <span>Harga Jual Belum dimasukan!</span>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
