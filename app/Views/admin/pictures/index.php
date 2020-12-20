<?= view('themes/admin/head') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title  mr-2">Product Image</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-16" style="width: 100%;">
                <div class="row">
                    <div class="col-md-6">
                        <h1><?= $product['name'] ?></h1>
                        <h4 class="font-weight-bold text-muted"><?= $product['sku'] ?></h4>
                    </div>
                    <div class="col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="<?= base_url('admin/images/uploads/'.$product['product_id']) ?>" name="form-example-2" id="form-example-2" enctype="multipart/form-data">
                            <div class="input-field">
                                <label class="active">Photos</label>
                                <input type="file" name="image" multiple>
                                <div class="input-images-1" name="image" style="padding-top: .5rem;"></div>
                            </div>

                            <button>Submit and display data</button>

                        </form>
                    </div>
                </div>

                <div>
                    <a class="btn btn-default" id="cancel">Cancel</a>
                    <a class="btn btn-primary" id="upload">Upload Photo</a>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<?= $this->endSection() ?>
<?= view('themes/body') ?>
<script>
    $('.input-images-1').imageUploader();
    $('#cancel').on('click', function(){
        window.close()
    })
    $('#upload').on('click', function(){
        var images = $('.input-images-1')[0].files[0];
        console.log(images);
    })
</script>
<?= view('themes/admin/footer') ?>