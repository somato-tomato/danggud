<x-app-layout>
    <x-slot name="header_content">
    </x-slot>


    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-12 my-form">
                <form action="{{ route('faktur.store1') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Pengajuan PPM / J') }}</h5>
                        </div>
                        <div class="card-body">
                            <div id="dynamicTable">
                                <div hidden class="form-group">
                                    <label for="idPPC">idPPC</label>
                                    <input readonly type="text" class="form-control" name="addmore[0][idPPC]" id="idPPC" value="">
                                </div>
                                <div class="form-group">
                                    <label for="namaMaterial">Nama Material</label>
                                    <input type="text" class="form-control" name="addmore[0][namaMaterial]" id="namaMaterial">
                                </div>
                                <hr/>
                                <div class="form-row col-md-12 justify-content-center">
                                    <input type="text" class="form-control col-md-2" name="addmore[0][satuan]" id="satuan" placeholder="Satuan">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="addmore[0][jumlahMaterial]" id="box1" class="box1 form-control col-md-2" type="text" placeholder="Jumlah Material"/>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="addmore[0][satuanHarga]" id="box2" class="box2 form-control col-md-2" type="text" placeholder="Satuan Harga"/>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="addmore[0][jumlahHarga]" id="answer" class="answer form-control col-md-2" type="text" value="" placeholder="Jumlah Harga" readonly/>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="Keterangan">keterangan</label>
                                    <input type="text" class="form-control" name="addmore[0][keterangan]" id="keterangan">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" name="add" id="add" class="btn btn-success btn-round">{{ __('Tambah Material') }}</button>
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Ajukan Material !') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#add").click(function(){
            ++i;
            $("#dynamicTable").append(
                '<div id="rows">' +
                '<hr style="border: 5px solid gray">' +
                '<div hidden class="form-group">' +
                '<label for="idPPC">idPPC</label>' +
                '<input readonly type="text" class="form-control" name="addmore['+i+'][idPPC]" id="idPPC" value="">' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="namaMaterial">Nama Material</label>' +
                '<input type="text" class="form-control" name="addmore['+i+'][namaMaterial]" id="namaMaterial">' +
                '</div>' +
                '<hr/>' +
                '<div class="form-row col-md-12 justify-content-center">' +
                '<input type="text" class="form-control col-md-2" name="addmore['+i+'][satuan]" id="satuan" placeholder="Satuan">' +
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                '<input name="addmore['+i+'][jumlahMaterial]" id="box1'+i+'" class="box1 form-control col-md-2" type="text" placeholder="Jumlah Material"/>' +
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                '<input name="addmore['+i+'][satuanHarga]" id="box2'+i+'" class="box2 form-control col-md-2" type="text" placeholder="Satuan Harga"/>' +
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' +
                '<input name="addmore['+i+'][jumlahHarga]" id="answer'+i+'" class="answer form-control col-md-2" type="text" value="" placeholder="Jumlah Harga" readonly/>' +
                '</div>' +
                '<hr/>' +
                '<div class="form-group">' +
                '<label for="keterangan">keterangan</label>' +
                '<input type="text" class="form-control" name="addmore['+i+'][keterangan]" id="keterangan">' +
                '</div>' +
                '<button type="button" class="btn btn-danger remove-div">Hapus Material</button>' +
                '</div>');
        });
        $(document).on('click', '.remove-div', function(){
            $('#rows').remove();
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $(".my-form").on('input', '.box2', function(){
                var total_row = $(this).val();
                total_row *= $(this).siblings(".box1").val();
                $(this).siblings( '.answer').val(total_row);
                // calTotal();
            });
            $(".my-form").on('input', '.box1', function(){
                var total_row = $(this).val();
                total_row *= $(this).siblings(".box2").val();
                $(this).siblings('.answer').val(total_row);
                //calTotal();
            });
        });
    </script>
</x-app-layout>




