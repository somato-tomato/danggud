<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Daftar Outlet') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Daftar Outlet</div>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><strong>Tambah Laporan</strong></h3>
                    <form  action="{{ route('laporan.index') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="form-group">
                            <select class="form-control form-control-sm ok" name="jenisOutlet" id="jenisOutlet">
                                <option value="" selected=""> -- Nama Outlet --</option>
                                @foreach ($outlet as $outlet)
                                <option value="{{$outlet->namaOutlet}}">{{$outlet->namaOutlet}}</option>
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
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>no</th>
                                <th scope="col">Nama Outlet</th>
                                <th scope="col">invoice</th>
                                <th scope="col">total</th>
                                <th scope="col">HPP</th>
                                <th scope="col">Laba</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <?php $no = 0;?>
                            @foreach ($ViewsPage as $V)
                            <?php $no++ ;?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $V->namaOutlet }}</td>
                                    <td>{{ $V->invoice }}</td>
                                    <td>{{ $V->grandTotal }}</td>
                                    <td>{{ $V->HPP }}</td>
                                    <td>{{ $V->laba }}</td>
                                    <td><a href="/kwitansi/cetak/{{ $V->id }}" class="btn btn-xs btn-primary">Cetak</a></td>

                                </tr>
                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- <script type="text/javascript">

    $(function () {
               $( "#jenisOutlet" ).prop( "disabled", false );

                $('#sitem').change(function(){
                   if ($(this).is(':checked')) {
                      $( "#jenisOutlet" ).prop( "disabled", false );

                   }else if(!$(this).is(':checked')){
                       $( "#jenisOutlet" ).prop( "disabled", true );
                   }
               });
              });

   </script> --}}
   <script type="text/javascript">
      $(function () {
        $("#sitem").click(function () {
            if ($(this).is(":checked")) {
                $("#jenisOutlet").attr("disabled", "disabled");
                $("#jenisOutlet").focus();
            } else {
                $("#jenisOutlet").removeAttr("disabled");
            }
        });
    });
</script>
