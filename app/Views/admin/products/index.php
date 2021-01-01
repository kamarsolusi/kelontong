<?= view('themes/admin/head') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Manage Products</h1>
                <div class="card-tools form-inline">
                    <div class="mr-3">
                        <button type="button" data-toggle="modal" data-target="#myModal" id="tambah-data" onclick="submit('tambah')" class="btn btn-primary">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Tambah Data
                        </button>
                    </div>
                    
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-16" style="width: 100%;">
                <table class="table table-head-fixed text-nowrap" id="table-product" style="width: 100%;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Berat (gram)</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody  id="table-body">

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
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name">Nama Barang</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ex : Prouct Saya">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="number" maxlength="13" class="form-control" id="sku" name="sku" placeholder="ex : 8968574634542">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Barang</label>
                                <input type="number" min="0" class="form-control" id="harga" name="harga" placeholder="ex : 100000">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" id="category_id"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok Barang</label>
                                <input type="number" min="0" class="form-control" id="stok" name="stok" placeholder="ex : 15">
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat (gram)</label>
                                <input name="berat" class="form-control" id="berat" min="0" placeholder="0"></input>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="">Pilih Status</option>
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detail">Detail Barang</label>
                                <textarea  class="form-control" id="detail" rows="5" name="detail" placeholder="ex : Prouct Saya"></textarea>
                            </div>
                        </div>
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
<?= view('themes/admin/footer') ?>