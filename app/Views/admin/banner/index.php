<?php $request = \Config\Services::request(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('img/LogoKelontong.png') ?>" type="image/x-icon">

    <title><?= isset($title) ? $title : 'Kelontong' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,500,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- JQUERY -->
    <script src="<?= base_url() ?>/themes/plugins/jquery/jquery.min.js"></script>  
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Dropzone -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />"> -->
    <link rel="stylesheet" href="<?= base_url('themes/dist/css/') ?>/dropzone.min.css">
</head>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title  mr-2">Banner Image</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-16" style="width: 100%;">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Input Banner</h1>
                        <p class="font-weight-bold text-muted" id="sku">Max 2 MB , and Max 5 Files</p>
                    </div>
                    <div class="col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form action="<?= base_url('admin/banner/process_upload') ?>" class="dropzone">
                            <div class="dz-message" style="text-align: center;">
                                <i class="fas fa-cloud-upload-alt"></i> Klik disini atau drop file disini
                            </div>
                        </form>
                    </div>
                </div>

                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="preview-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body" id="img-body">
        
      </div>
      
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= view('themes/body') ?>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/themes/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/themes/dist/js/adminlte.js"></script>
<script src="<?= base_url() ?>/themes/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/themes/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Dropzone -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script> -->
<script type="text/javascript" src="<?= base_url('themes') ?>/dist/js/dropzone.min.js"></script>
<script>
    
    var count_file = 0;
    Dropzone.autoDiscover = false;
    $('.dropzone').dropzone({
        init: function(){
            myDropzone = this;
            $.ajax({
                url: "<?= base_url('admin/banner/load') ?>",
                type: 'get',
                dataType: 'json',
                success: function(response){
                    var i = 0;
                    $.each(response['file_list'], function(key, value){
                        var mockFile = {
                            name: value.name, 
                            size: value.size, 
                            token: response['pictures'][i]['token'],
                        };

                        myDropzone.emit('addedfile', mockFile);
                        myDropzone.emit('thumbnail', mockFile, value.path);
                        myDropzone.emit('complete', mockFile);

                        i++;
                    })
                },
                error: function(error){
                    console.log(error);
                }
            });
            myDropzone.on('addedfile', function(file){
                count_file += 1;
                if(count_file > 5){
                    myDropzone.removeFile(file);
                    Swal.fire({
                        icon: 'error',
                        title: 'Limit 5 Pictures',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                $('.dz-remove').addClass('btn btn-danger mt-2 my-3');

                file.previewElement.addEventListener("click", function(e) {
                    var src = this.querySelectorAll('.dz-image > img')[0].alt;
                    console.log(src);
                    $('#preview-image').modal('show');
                    $('#img-body').empty();
                    $('#img-body').append(`
                        <img class='w-100' src='http://localhost:8080/upload/banner/`+src+`'/>
                    `);
                });
            });
            myDropzone.on('error', function(file, message) {
                alert(message);
                myDropzone.removeFile(file);
            });
            myDropzone.on('dragend', function(file){
                $.ajax({
                    url: '<?= base_url('admin/banner/process_upload') ?>',
                    method: 'post',
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                    }
                })
            });
            myDropzone.on('sending', function(file,xhr,c){
                file.token = Math.random();
                file.sku = sku;
                c.append('token', file.token);
                c.append('sku', file.sku);
            });
            myDropzone.on('thumbnail', function(file, dataUrl) {
                $('.dz-image').last().find('img').attr({
                    width: '100%',
                    height: '100%'
                });
            });
            myDropzone.on('removedfile', function(a) {
                count_file -= 1;
                var token = a.token;
                $.ajax({
                    url: '<?= base_url('admin/banner/delete') ?>/' + token,
                    method: 'delete',
                    dataType: 'json',
                    success: function(data) {
                        if(data['status']==200){
                            Swal.fire({
                                toast: !0,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Deleted Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                })
            });
            
        },
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        maxFiles: 5,
        thumbnailWidth: 250,
        thumbnailHeight: 250,
    });

    $('.dz-filename').on('click', function(){
        $('#preview-image').modal('show');
        var base_url = window.location.origin;
        $('#img-body').append(`
            <img src='`+base_url+`/upload/banner/``' />
        `);
    })

    $('#cancel').on('click', function(){
        window.close()
    })
    $('#upload').on('click', function(){
        var images = $('.input-images-1')[0].files[0];
        console.log(images);
    })
</script>
</body>

</html>
