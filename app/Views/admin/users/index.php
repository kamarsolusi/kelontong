<?= view('themes/admin/head') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Manage Users</h1>
                <!-- <div class="card-tools form-inline">
                    <div class="mr-3">
                        <button type="button" data-toggle="modal" data-target="#myModal" id="tambah-data" onclick="submit('tambah')" class="btn btn-primary disabled">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Tambah Data
                        </button>
                    </div>
                    
                </div> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-16" style="width: 100%;">
                <table class="table table-head-fixed text-nowrap" id="table-user" style="width: 100%;">
                    <thead >
                        <tr>
                            <th></th>
                            <th>Profile</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="username">First Name</label>
                                <input type="text" class="form-control" id="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="username">Last Name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Full Name</label>
                        <input type="text" class="form-control" disabled id="fullname" name="fullname" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label for="status">User Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="">Pilih Status</option>
                            <option value="1">ACTIVE</option>
                            <option value="0">INACTIVE</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a onclick="tambahData()" class="btn btn-primary " id="btn-tambah">Tambah Data</a>
                    <a onclick="updateData()" class="btn btn-primary " id="btn-ubah">Ubah</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= view('themes/body') ?>
<script>
    var table;
    $(document).ready(function() {
        table = $('#table-user').DataTable( {
            ajax: {
                url: "../admin/users/show",
                dataSrc: 'results',
                dataType: 'json',
                type: 'GET',
            },
            responsive: true,
            autoWidth: false,
            bInfo: false,
            lengthMenu: [
                [5, 10, 25],
                [5, 10, 25],
            ],
            lengthChange: true,
            bProcessing: true,
            retrieve: true,
            language: {
                processing: "Sedang memuat data..",
                decimal: ",",
                thousands: "."
            },
            columns: [
                {   
                    data: null,
                    sortable: false,
                    render: function(data, type, row, meta){
                        return meta.row+1;
                    }
                },
                {
                    data: 'profile_picture',
                    mRender: function(data, type, row){
                        return `<img  src='<?= base_url()?>/img/`+data+`' alt='`+data+`' class="img-circle elevation-2" style="width: 35px; width: 35px;">`
                    }
                    
                },
                {data: 'fullname'},
                {data: 'username'},
                {
                    data: 'email',
                    mRender: function(data, type, row){
                        return `<small>`+data+`</small>`;
                    }
                },
                {
                    data: 'active',
                    mRender: function(data, type, row){
                        if(data == 1){
                            return `<small class='btn btn-xs btn-info'><i class="fas fa-check-circle mr-2"></i>ACTIVE</small>`
                        }else{
                            return `<small class='btn btn-xs btn-danger'><i class="fas fa-times-circle mr-2"></i>INACTIVE</small>`
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row){
                        return `
                        <a class="btn btn-sm btn-danger disabled" onclick="detailData(`+data+`)"><i class="fas fa-search mr-2"></i>Detail</a>
                        <a data-toggle="modal" onclick="submit(`+data+`)" class="btn btn-sm btn-success" data-target="#myModal" ><i class="fas fa-edit mr-2"></i>Edit</a> 
                        <a class="btn btn-sm btn-danger" onclick="deleteData(`+data+`)"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                        `
                    },
                    
                }
            ],
        });

        $('#firstname').on('input', function(){
            $('#fullname').val($('#firstname').val() + ' ' + $('#lastname').val());
        })

        $('#lastname').on('input', function(){
            $('#fullname').val($('#firstname').val() + ' ' + $('#lastname').val());
        })
    });

    function submit(id) {
        $('#id').val('');
        $('#firstname').val('');
        $('#lastname').val('');
        $('#username').val('');
        $('#fullname').val('');
        $('#status').val('');


        if (id != 'tambah') {
            $('#myModalTitle').text('Ubah Data');
            $('#btn-tambah').hide();
            $('#btn-ubah').show();

            $.ajax({
                url: "../admin/users/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    // console.log(data['results']['active']);
                    var status = data['results']['active'];
                    $('#id').val(data['results']['id']);
                    $('#firstname').val(data['results']['firstname']);
                    $('#lastname').val(data['results']['lastname']);
                    $('#username').val(data['results']['username']);
                    $('#fullname').val(data['results']['firstname'] + ' ' + data['results']['lastname']);
                    $('#status').val(status);
                },
                error: function(error){
                    console.log(error);
                }
            })
        }
    }

    function updateData() {
        var id = $('#id').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var username = $('#username').val();
        var status = $('#status').val();
        
        $.ajax({
            url: '../admin/users/' + id,
            type: 'put',
            data: 'firstname='+firstname+'&lastname='+lastname+'&username='+username+'&active='+status,
            dataType: 'json',
            success: function(data) {
                $('#myModal').modal('hide');

                if(data['status'] == 200){

                    table.ajax.reload();

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: data['message'],
                    })
                }else {
                    table.ajax.reload();
                    Swal.fire({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton:false,
                        timer: 3000,
                        icon: 'error',
                        title: data['message']
                    })
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function tambahData() {
        var sku = $('#sku').val();
        var name = $('#name').val();
        var category_id = $('#category_id').val();
        var harga = $('#harga').val();
        var stok = $('#stok').val();
        var status = $('#status').val();

        $.ajax({
            url: '../admin/products/add',
            type: 'post',
            data: 'sku='+sku+'&name='+name+'&category_id='+category_id+'&harga='+harga+'&stok='+stok+'&status='+status,
            dataType: 'json',
            success: function(data) {
                if (data['status'] == 200) {
                    table.ajax.reload();
                    $('#myModal').modal('hide');
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: 'Data Inserted Successfully',
                    })
                }
            },
        })
    }

    function deleteData(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Iya, Hapus saja!`,
            cancelButtonText: `Tidak, Batal!`,
            customClass: {
                confirmButton: 'btn btn-danger mr-3',
                cancelButton: 'btn btn-primary',
            },
            buttonsStyling: false,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '../admin/users/' + id,
                    type: 'delete',
                    dataType: 'json',
                    error: function(data) {
                        Swal.fire({
                            title: 'Someting is wrong',
                            icon: 'warning',
                            text: data,
                        })
                    },
                    success: function(data) {
                        if(data['status']=='200'){
                            table.ajax.reload();
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'success',
                                title: data['message'],
                            })
                        }else{
                            table.ajax.reload();
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'error',
                                title: data['message']
                            })
                        }

                    }
                })
            } else {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    icon: 'info',
                    title: 'Change are not save!',
                    text: 'Your data is saved!'
                })
            }
        })
    }
</script>
<?= view('themes/admin/footer') ?>