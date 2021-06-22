@extends('index2')
@section('title','List Antrian')
@section('content')
    <div class="row">
        <div class="col-lg-8" >
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('servis.store') }}">
                        {{ csrf_field() }}
                        <span class="card-title">Registrasi & servis</span>  || &nbsp; &nbsp; &nbsp; &nbsp;<span style="text-align: right">No urut : 01</span>
                        <p class="card-title-desc">Use the tab JavaScript plugin—include it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code> file—to extend our navigational tabs and pills to create tabbable panes of local content, even via dropdown menus.</p>

                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">Data diri</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">Data Motor dan Kondisi awal SMH</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">pekerjaan</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#messages-2" role="tab">suku cadang</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#messages-3" role="tab">Paket tambahan dan lain lain</a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div>
                                            <div class="form-group mb-4">
                                                <label for="input-date1">Nama STNK</label>
                                                <input id="input-date1" class="form-control input-mask" id="stnk" name="stnk">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="input-date1">HP</label>
                                                <input id="input-date1" class="form-control input-mask" id="hp" name="hp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-4 mt-lg-0">
                                            <div class="form-group mb-4">
                                                <label for="input-repeat">Nama Pembawa</label>
                                                <input id="input-repeat" class="form-control input-mask" id="pembawa" name="pembawa">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="input-repeat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="6"></textarea>
                                </div>

                            </div>
                            <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <div class="form-group mb-4 sm:col-span-4">
                                                <label for="input-date1">No. Polisi</label>
                                                <input id="input-date1" style="width: 40%" class="form-control input-mask" id="polisi" name="polisi">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="input-date1">No. Mesin</label>
                                                <input id="input-date1" style="width: 50%" class="form-control input-mask" id="polisi" name="polisi">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Type</label>
                                                    <input type="text" class="form-control" id="type" name="type">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity">Tahun</label>
                                                    <input type="text" class="form-control" id="tahun" name="tahun">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputZip">KM</label>
                                                    <input type="text" class="form-control" id="km" name="km">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                                <livewire:transaksi.index />



                            </div>
                            <div class="tab-pane p-3" id="messages-2" role="tabpanel">
                                <p class="font-14 mb-0">
                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.
                                </p>
                            </div>
                            <div class="tab-pane p-3" id="messages-3" role="tabpanel">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Create</button>

                            </div>
                        </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h1>Kondisi Awal SMH</h1>
                    <img src="https://i1.wp.com/stat.ks.kidsklik.com/statics/files/2012/11/1353425030645366456.png?zoom=2">
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

@include('layout.vendor-scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.3.2/select2.min.js"></script>
<script language="JavaScript" type="text/JavaScript">

    let dataOutlet = null;
    let dataJenis = null;
    let dataBarang = null
    let hargaBarang = null

    $('#outlet').on('change', function(e){



        var id = $('#outlet option:selected').val()

        $.get('/faktur/' + id, function(data){
            dataOutlet = data;
            $.each(data, function(index, dataOutlet){
                var namaOutlet = dataOutlet['namaOutlet'];
                var alamatOutlet = dataOutlet['alamat'];
                var jenisOutlet = dataOutlet['jenisOutlet'];

                $('#namaOutlet').val(namaOutlet);
                $('#alamatOutlet').val(alamatOutlet);
                $('#jenisOutlet').val(jenisOutlet);

                $.get('/fakturJenis/' + dataOutlet['jenisOutlet'], function(data){
                    dataJenis = data;
                    console.log(data);
                    for(let i = 0; i < data.length; i++){

                        $.get('/fakturGoods/' + data[i].goods_id, function(dataGoods){
                            $('#goods').append(`<option value="${dataGoods[0].id}">${dataGoods[0].namaBarang} (${dataGoods[0].stok})</option>`);
                        });

                    }
                });

            });
        });
        $('#goods').select2();
    });
</script>
<script>
    $(document).ready( function () {
        $('#datatable-buttons').DataTable();
    } );
</script>



