<?= view('themes/admin/head') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2 text-center" id="profile-picture">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('img/logo-nav.png') ?>" alt="User profile picture">
                            </div>
                            <div class="col-md-10">
                                <h3 class="profile-username" id="nama-toko">Kelontong</h3>
        
                                <p class="text-muted" id="nomor-toko">+6281223008363</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <button class="btn btn-success w-100" id="edit" onclick="edit()"> Edit </button>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Nama Toko</label>
                            <h5 class="font-weight-normal" id="nama" value=""></h5>
                        </div>

                        
                        <!-- picture -->
                        <!-- <div class="input-group" id="picture">
                            <p class="text-muted mb-0 pb-1">Change Image</p>
                            <input type="hidden" id="old_id" value="">
                            <input type="hidden" id="oldProfileImage" value="">
                            <div class="input-group">

                                <div class="custom-file">
                                    <label class="custom-file-label" for="profile_picture"></label>
                                    <input type="file" class="custom-file-input" id="profile_picture" accept=".jpg, .png, .svg, .gif">
                                </div>
                            </div>
                        </div> -->
                        <!-- end picture -->
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Nomor Toko</label>
                            <h5 class="font-weight-normal" id="nomor" value=""></h5>
                        </div>                    
                    </div>
                </div>
                

                <div class="row" id="address">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Alamat Toko</label>
                            <h5 class="font-weight-normal" id="full-address" value=""></h5>
                        </div>
                    </div>
                </div>
                <!-- Alamat -->
                <div class="row" id="alamat-toko">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Provinsi</label>
                            <select class="font-weight-normal form-control" id="provinsi" value="">
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Kota / Kabupaten</label>
                            <select class="form-control font-weight-normal" id="kota" value="">
                                <option value="">Pilih Kota / Kabupaten</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Alamat Lengkap</label>
                            <textarea class="form-control font-weight-normal" id="full-alamat"  placeholder="Alamat"></textarea>
                        </div>
                    </div>
                </div>                  
                    
                <a href="#" class="btn btn-primary btn-block mt-5" id='simpan'><b>Simpan</b></a>
                <a href="#" class="btn btn-default btn-block" id="cancel" ><b>Cancel</b></a>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
        <!-- /.col -->
        
<!-- /.col -->
</div>

<?= $this->endSection() ?>
<?= view('themes/body') ?>
<script>
    var base;

    $(document).ready(function(){
        base =  window.location.origin;
        show();
        $('#page-title').text('Options');
        $('#simpan').hide();
        $('#cancel').hide();
        // $('#picture').hide();
        $('#alamat-toko').hide();
        loadProvinsi();
    })

    function show(){
        $.ajax({
            url: base + '/admin/options/show',
            dataType: 'json',
            method:'get',
            success: function(response){
                if(response['results']==''){
                    $('#nama-toko').text('Not Found');
                    $('#nomor-toko').text('Not Found');
                    $('#nama').text('Not Found');
                    $('#nomor').text('Not Found');
                    $('.profile-user-img').attr('src', base + '/img/logo-nav.png');
                    $('#full-alamat').text('Jln Contoh, Pkjkjfldlf, dfdf sdfsdf');
                }else{
                    $('#nama-toko').text(response["results"][0]['name']);
                    $('#nomor-toko').text(response["results"][0]['telphone']);
                    $('#nama').text(response["results"][0]['name']);
                    $('#nomor').text(response["results"][0]['telphone']);
                    $('.profile-user-img').attr('src', base + '/img/logo-nav.png');
                    $('#full-alamat').text(response["results"][0]['alamat']);
                    $('#full-address').text(response["results"][0]['alamat']);
                    $('#old_id').val(response["results"][0]['id']);
                }
            }
        })
    }

    function loadProvinsi(){
        $('#provinsi').empty();
        $.ajax({
            url: base + '/admin/options/rajaongkir/province',
            method: 'get',
            dataType: 'json',
            success: function(response){
                $.each(response['rajaongkir']['results'], function(key,value){
                    $('#provinsi').append(`
                        <option value='`+value['province_id']+`'>`+value['province']+`</option>
                    `)
                });
            
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function loadKota(){
        $('#kota').empty();
        var id_province = $('#provinsi').val();
        $.ajax({
            url: base + '/admin/options/rajaongkir/city/' + id_province,
            method: 'get',
            dataType: 'json',
            success: function(response){
                $.each(response['rajaongkir']['results'], function(key,value){
                    $('#kota').append(`
                        <option value='`+value['city_id']+`'>`+value['city_name']+`</option>
                    `)
                });
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    $('#provinsi').on('change', function(){
        loadKota();
    })

   

    function edit(id){
        $('#edit').hide();
        $('#cancel').show();
        // $('#picture').show();
        $('#alamat-toko').show();
        $('#simpan').show();
        $('#address').hide();

        var nama = $('#nama').text();
        var nomor = $('#nomor').text();
        
        var baseUrl = window.location.origin;

        $('#nama').replaceWith(`<input id='nama' class='form-control' value="`+ nama +`">`);
        $('#nomor').replaceWith(`<input id='nomor' class='form-control' value="`+ nomor +`">`);

        $('#nama').on('input', function(){
            $('#nama-toko').text($(this).val());
        })

        $('#nomor').on('input', function(){
            $('#nomor-toko').text('+'+ $(this).val());
        })

        // $('#profile_picture').change(function(){
        //     readURL(this);
        // })

        $('#cancel').on('click', function(){
            $('#edit').show();
            $('#cancel').hide();
            // $('#picture').hide();
            $('#alamat-toko').hide();
            $('#simpan').hide();
            $('#address').show();

            $('#nama').replaceWith(`<h5 class="font-weight-normal" id="nama" value=""></h5>`);
            $('#nomor').replaceWith(`<h5 class="font-weight-normal" id="nomor" value=""></h5>`);

            show();
        })

        $('#simpan').on('click', function(){
            var name = $('#nama-toko').text();
            nomor = $('#nomor').val();
            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var alamat = $('#full-alamat').val(); 
            var id = $('#old_id').val();

            console.log(name);
            if(id == null){
                $.ajax({
                    url: base + '/admin/options/store',
                    method: 'post',
                    dataType: 'json',
                    data: 'nama='+ name +'&telphone='+nomor+'&provinsi='+provinsi+'&kota='+kota+'&alamat=' + alamat,
                    success: function(response){
                        console.log(response);
                    }
                })
            }else{
                $.ajax({
                url: base + '/admin/options/store/' + id,
                    method: 'post',
                    dataType: 'json',
                    data: 'nama='+name+'&telphone='+nomor+'&provinsi='+provinsi+'&kota='+kota+'&alamat=' + alamat,
                    success: function(response){
                        console.log(response);
                    }
                })
            }

            

            $('#edit').show();
            $('#cancel').hide();
            // $('#picture').hide();
            $('#alamat-toko').hide();
            $('#simpan').hide();
            $('#address').show();

            $('#nama').replaceWith(`<h5 class="font-weight-normal" id="nama" value=""></h5>`);
            $('#nomor').replaceWith(`<h5 class="font-weight-normal" id="nomor" value=""></h5>`);

            show();
        })
    }

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function(e){
                $('.profile-user-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= view('themes/admin/footer') ?>