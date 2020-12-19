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
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('/img/'.user()->profile_picture )?>" alt="User profile picture">
                            </div>
                            <div class="col-md-10">
                                <h3 class="profile-username" id="fullname"><?= user()->firstname . ' '. user()->lastname ?></h3>
        
                                <p class="text-muted"><?= user()->email ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <button class="btn btn-success w-100" id="edit" onclick="edit(<?= $dataUser[0]->id ?>)"> Edit </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">First Name</label>
                            <h5 class="font-weight-normal" id="firstname" value=""><?= user()->firstname?></h5>
                        </div>

                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Gender</label>
                            <h5 class="font-weight-normal" id="gender">Laki-laki</h5>
                        </div>

                        
                        <!-- picture -->
                        <div class="input-group" id="picture">
                            <p class="text-muted mb-0 pb-1">Change Image</p>
                            <input type="hidden" id="oldProfileImage" value="<?= user()->profile_picture?>">
                            <div class="input-group">

                                <div class="custom-file">
                                    <label class="custom-file-label" for="profile_picture"><?= user()->profile_picture ?></label>
                                    <input type="file" class="custom-file-input" id="profile_picture" accept=".jpg, .png, .svg, .gif">
                                </div>
                            </div>
                        </div>
                        <!-- end picture -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Last Name</label>
                            <h5 class="font-weight-normal" id="lastname" value=""><?= user()->lastname?></h5>
                        </div>

                        <div class="form-group">
                            <label class="text-muted font-weight-normal" for="">Alamat</label>
                            <h5 class="font-weight-normal" id="alamat">Yogyakarta</h5>
                        </div>                        
                    </div>
                </div>

                    
                    
                    <a href="#" class="btn btn-primary btn-block mt-5" id="cancel" ><b>Cancel</b></a>
                
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
    $(document).ready(function(){
        $('#page-title').text('Profile');
        $('#cancel').hide();
        $('#picture').hide();

    })

    function edit(id){
        $('#edit').hide();
        $('#cancel').show();
        $('#picture').show();

        var firstname = $('#firstname').text();
        var lastname = $('#lastname').text();
        var gender = $('#gender').text();
        
        var baseUrl = window.location.origin;

        $('#firstname').replaceWith(`<input id='firstname' class='form-control' value="`+ firstname +`">`);
        $('#lastname').replaceWith(`<input id='lastname' class='form-control' value="`+ lastname +`">`);
        $('#gender').replaceWith(`
            <select class='form-control' id='gender'>
                <option value=''>Choose Your Gender ..</option>
                <option value='0'>Laki-laki</option>
                <option value='1'>Perempuan</option>
            </select>
        `);

        $('#firstname').on('input', function(){
            $('#fullname').text($('#firstname').val() + ' ' +$('#lastname').val());
        })

        $('#lastname').on('input', function(){
            $('#fullname').text($('#firstname').val() + ' ' +$('#lastname').val());
        })

        $('#profile_picture').change(function(){
            readURL(this);
        })

        $('#cancel').on('click', function(){
            $('#edit').show();
            $('#cancel').hide();
            $('#picture').hide();

            $('#fullname').text(firstname + ' ' + lastname);
            $('#firstname').replaceWith(`<h5 class="font-weight-normal" id="firstname">`+firstname+`</h5>`)
            $('#lastname').replaceWith(`<h5 class="font-weight-normal" id="lastname">`+lastname+`</h5>`)
            $('.profile-user-img').attr('src', baseUrl+'/img/'+$('#oldProfileImage').val());
            $('#gender').replaceWith(`<h5 class="font-weight-normal" id="gender">`+ gender+`</h5>`);
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

    function cancel(){
        $('#edit').show();
        $('#cancel').hide();
        $('#picture').hide();

        var gender = $('#gender').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var baseUrl = window.location.origin;

        $('#firstname').replaceWith(`<h5 class="font-weight-normal" id="firstname">`+firstname+`</h5>`)
        $('#lastname').replaceWith(`<h5 class="font-weight-normal" id="lastname">`+lastname+`</h5>`)
        $('.profile-user-img').attr('src', baseUrl+'/img/'+$('#oldProfileImage').val());
        $('#gender').replaceWith(`<h5 class="font-weight-normal" id="gender">`+ (gender==0?'Laki-laki':'Perempuan')+`</h5>`);
    }

    

</script>
<?= view('themes/admin/footer') ?>