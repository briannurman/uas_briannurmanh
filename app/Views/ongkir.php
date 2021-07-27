<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ongkir</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>

<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
    <a class="navbar-brand m-1" href="#">Ongkir</a>
</nav>

<div class="container mt-5" >
    <div class="card bg-danger text-white">
        <div class="card-header">
            Shipment
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Shipment Origin:</legend>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Provinsi</label>
                                
                                <div class="col-sm-9">
                                    <select name="province_origin" id="provisi_origin" class="form-control">
                                        <option value="0">Provinsi</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row mt-3">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Kota</label>
                                <div class="col-sm-9">
                                    
                                    <select name="city" id="city" class="form-control">
                                        <option value="0">Kota</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Kode Pos</label>
                                <div class="col-sm-9">
                                    <select name="postal_code" id="postal_code" class="form-control">
                                        <option value="0">kode pos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>Shipment Destination</legend>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label" style="text-align: right;">Provinsi</label>
                                <div class="col-sm-9">
                                    <select name="province" id="provisi_id_des" class="form-control">
                                        <option value="0">Tujuan Provinsi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Kota</label>
                                <div class="col-sm-9">
                                    <select name="city" id="city_id" class="form-control">
                                        <option value="0">Tujuan Kota</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Berat Barang</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="numeric" id="weight" name="weight" class="form-control">
                                        <span class="input-group-text"> KG </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Kurir</label>
                                <div class="col-sm-9">
                                    <select name="kurir" id="kurir" class="form-control">
                                        <option value="0" selected>Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Paket</label>
                                <div class="col-sm-9" id="paket_radio">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label class="col-sm-3 col-form-label" style="text-align: right;">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer text-muted" style="text-align: right;">
            <button class="btn btn-outline-warning" id="reset">Reset</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Hitung Biaya</button>
        </div>

        <div class="modal" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Dialog Hasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Biaya yang diperlukan adalah</p>
                        <h2 name="ongkir" id="ongkir" class="text-success text-center"></h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
$(document).ready(function(){
    
    //Shipment Origin
    console.log("awawawaw")
    $.ajax({
    type: "GET",
    url: '<?php echo site_url('/api/ongkir'); ?>?mode=Province',
    dataType: "json"
    }).done(function (data) {
        console.log(data)
        var html = '<option value="0">Provinsi</option>';
        for(let i=0; i< data.length; i++){
            html += '<option value="'+data[i].province_id+'">'+data[i].province+'</option>';
        }
        $('#provisi_origin').html(html);

    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });

    //isi cmb kabupaten origin
    $('#provisi_origin').change(function(){
        let province = $(this).val();

        $.get('<?php echo site_url('/api/ongkir'); ?>?mode=City&province='+province,function(data){
            //city origin
            
            var html = '<option value="0">Kota</option>';
            for(let i=0; i< data.length; i++){
                html += '<option value="'+data[i].city_id+'">'+data[i].type+'-'+data[i].city_name+'</option>';
            }
            $('#city').html(html);
        });
    });

    $('#city').change(function(){
        let city = $(this).val();

        $.get('<?php echo site_url('/api/ongkir'); ?>?mode=Postal&city='+city,function(data){
            html = '<option value="'+data.city_id+'">'+data.postal_code+'</option>';
            $('#postal_code').html(html);
        });
    });

    //Shipment Destination
    $.get('<?php echo site_url('/api/ongkir'); ?>?mode=Province',function(data){
        var html = '<option value="0">Tujuan Provinsi</option>';
        for(let i=0; i< data.length; i++){
            html += '<option value="'+data[i].province_id+'">'+data[i].province+'</option>';
        }
        $('#provisi_id_des').html(html);
    });

    //isi cmb kabupaten
    $('#provisi_id_des').change(function(){
        let province = $(this).val();

        $.get('<?php echo site_url('/api/ongkir'); ?>?mode=City&province='+province,function(data){
            var html = '<option value="0">Tujuan Kota</option>';
            for(let i=0; i< data.length; i++){
                html += '<option value="'+data[i].city_id+'">'+data[i].type+'-'+data[i].city_name+'</option>';
            }
            $('#city_id').html(html);
        });
    })

    const locale = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
    });

    $.fn.onSetBiaya = function() {
        let biaya = $(this).val();
        $("#ongkir").html(locale.format(biaya))
        console.log(biaya)
    }

    $('#kurir').change(function(){
        let origin = $('#city').val();
        let destination = $('#city_id').val();
        let kurir = $("#kurir").val();

        $.get('<?php echo site_url('/api/ongkir'); ?>?mode=Cost&destination='+destination+'&origin='+origin+'&kurir='+kurir,function(data){
            var html = '';
            let costs = data[0].costs;
            for(let i=0; i < costs.length; i++){
                html += '<div class="form-check">';
                html += '<input onClick="$(this).onSetBiaya()" name="biaya" value="'+costs[i].cost[0].value+'" class="form-check-input" type="radio">';
                html += '<label class="form-check-label" >'+ costs[i].description + '|'+ costs[i].cost[0].etd +" Hari"
                html += '</label>';
                html += '</div>';
            }
            $('#paket_radio').html(html);
        });
    })


    $('#reset').click(function(){
        window.location.reload()
    })

    
});
</script>
</body>
</html>
