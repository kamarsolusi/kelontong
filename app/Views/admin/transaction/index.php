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
                            <th>Invoice Number</th>
                            <th>Buyer</th>
                            <th>Reciever</th>
                            <th>Total Beli</th>
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
                    <input type="hidden" name="transaction_id" id="transaction_id">
                    <div class="form-group">
                        <label for="status">User Status Pesanan</label>
                        <select name="status" class="form-control" id="status">
                            <option value="">Pilih Status</option>
                            <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                            <option value="Terkonfirmasi">Terkonfirmasi</option>
                            <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                            <option value="Sampai tujuan">Sampai tujuan</option>
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
                url: "../admin/transactions/show",
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
                {data: 'transaction_number'},
                {
                    data: 'firstname',
                    mRender: function(data,type,row){
                        return row.firstname + ' ' + row.lastname;
                    }
                },
                {data: 'penerima'}, 
                {
                    data: 'grand_total',
                    render: $.fn.dataTable.render.number(",", ".", 2, "Rp ")
                },
                {data: 'status'},
                {
                    data: 'transaction_id',
                    render: function(data, type, row){
                        return `
                        <a href="`+window.location.origin+`/admin/transactions/detail/`+data+`" class="btn btn-sm btn-danger"><i class="fas fa-search mr-2"></i>Detail</a>
                        <a data-toggle="modal" onclick="submit(`+data+`)" class="btn btn-sm btn-success" data-target="#myModal" ><i class="fas fa-edit mr-2"></i>Edit Status</a> 
                        <a class="btn btn-sm btn-danger" onclick="deleteData(`+data+`)"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                        `
                    },
                    
                }
            ],
        });

    });

    function submit(trx_id){
        $('#myModalTitle').text('Ubah Status Pesanan');
        $('#btn-tambah').hide();
        $('#btn-ubah').show();
        $('#transaction_id').val();
        $.ajax({
            url: window.location.origin + '/admin/transactions/edit/' + trx_id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                $('#status').val(response['results']['status']);
                $('#transaction_id').val(response['results']['transaction_id']);
            }
        })
    }


    function updateData() {
        var id = $('#transaction_id').val();
        var status = $('#status').val();
        $.ajax({
            url: window.location.origin+'/admin/transactions/edit/' + id,
            type: 'put',
            data: 'status='+status,
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

    
</script>
<?= view('themes/admin/footer') ?>