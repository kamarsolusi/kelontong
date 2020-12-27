var table;
var image_id = 0;
Dropzone.autoDiscover = false;
var dropzoneOptions = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    autoProcessQueue: false,
    maxFiles: 1,
    acceptedFiles: 'image/*',

    addRemoveLinks : true,
    dictResponseError: 'Error while uploading file!',

    init: function(){
        if(image_id!=0){
            $.ajax({
                url: '../admin/categories/load',
                data: 'categories_id=' + image_id,
                dataType: 'json',
                method: 'get',
                success: function(response){
                    $.each(response['file_list'], function(key, value){
                        var mockFile = {
                            name: value.name, 
                            size: value.size, 
                            token: response['categories']['category_id'],
                        };

                        myDropzone.emit('addedfile', mockFile);
                        myDropzone.emit('thumbnail', mockFile, value.path);
                        myDropzone.emit('complete', mockFile);

                    })
                }
            })
        };
        
        $('#btn-tambah').on('click', function(e){
            if(myDropzone.files == 0){
                tambahData();
            }else{
                myDropzone.processQueue();
                $('#myModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Category Created Successfully !',
                    showConfirmButton: false,
                    timer: 3000,
                })
            }
        })
        $('#btn-ubah').on('click', function(e){
            if(myDropzone.files == 0){
                updateData();
            }else{
                myDropzone.processQueue();
                myDropzone.on('complete', function(){
                    $('#myModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Category Created Successfully !',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    // myDropzone.destroy();

                })
            }
        })
        this.on('thumbnail', function(file, dataUrl) {
            $('.dz-image').last().find('img').attr({
                width: '100%',
                height: '100%'
            });
        });
        this.on('maxfilesexceeded', function(file){
            myDropzone.removeFile(file);
            Swal.fire({
                icon: 'error',
                title: 'File Lebih dari satu',
                timer: 1500,
            })
        })
        this.on('removedfile', function(file){
            $.ajax({
                url: '../admin/categories/remove_image',
                data: 'category_id='+image_id,
                dataType: 'json',
                method: 'post',
                success: function(response){
                    console.log(response);
                }
            });
        });

    },
}
var myDropzone;

myDropzone = new Dropzone('.dropzone', dropzoneOptions);
$('#myModal').on('shown.bs.modal', function (e) {
    myDropzone.destroy();

    myDropzone = new Dropzone('.dropzone', dropzoneOptions);
});

$('.button-close').on('click', function(){
    myDropzone.destroy();
})
$('#myModal').on('hidden.bs.modal', function (e) {
    $('.dz-preview').remove();
});

$(document).ready(function () {
    table = $("#table-category").DataTable({
        ajax: { url: "../admin/categories/show", dataSrc: "results" },
        responsive: !0,
        bInfo: !1,
        lengthMenu: [
            [5, 10, 25],
            [5, 10, 25],
        ],
        lengthChange: !0,
        bProcessing: !0,
        retrieve: !0,
        language: { processing: "Sedang memuat data.." },
        columns: [
            {
                data: null,
                sortable: !1,
                render: function (a, b, c, d) {
                    return d.row + 1;
                },
            },
            {
                data: 'category_image',
                mRender: function(a){
                    return `<img class='w-100' src='`+window.location.origin +`/upload/category/`+a+`'/>`
                }
            },
            { data: "category_name" },
            {
                data: "category_status",
                mRender: function (a) {
                    return "ACTIVE" == a ? `<a class='btn btn-info'><i class="fas fa-check-circle mr-2"></i>` + a + `</a>` : `<a class='btn btn-danger'><i class="fas fa-times-circle mr-2"></i>` + a + `</a>`;
                },
            },
            {
                data: "category_id",
                render: function (a) {
                    return (
                        `<a data-toggle="modal" onclick="submit(` +
                        a +
                        `)" class="btn btn-success" data-target="#myModal" ><i class="fas fa-edit"></i>Edit</a> <a class="btn btn-danger" onclick="deleteData(` +
                        a +
                        `)"><i class="fas fa-trash-alt"></i>Hapus</a>`
                    );
                },
            },
        ],
    });
});
function submit(a) {
    $("#category_name").val(""),
        $("#category_status").val(""),
        image_id = 0,
        $('#my-dropzone').attr('action', window.location.origin + '/admin/categories/add'),
        "tambah" == a
            ? ($("#myModalTitle").text("Tambah Data"), $("#btn-tambah").show(), $("#btn-ubah").hide())
            : ($("#myModalTitle").text("Ubah Data"),
              $("#btn-tambah").hide(),
              $('#my-dropzone').attr('action', window.location.origin + '/admin/categories/update/'+ a),
              $("#btn-ubah").show(),
              image_id = a,
              $.ajax({
                  url: "../admin/categories/" + a,
                  type: "get",
                  dataType: "json",
                  success: function (a) {
                      $("#category_id").val(a.category_id), $("#category_name").val(a.category_name), $("#category_status").val(a.category_status);
                  },
              }));
}
function updateData() {
    var a = $("#category_id").val(),
        b = $("#category_name").val(),
        c = $("#category_status").val();
    $.ajax({
        url: "../admin/categories/update/" + a,
        type: "post",
        data: "category_name=" + b + "&category_status=" + c,
        dataType: "json",
        success: function (a) {
            console.log(a), $("#myModal").modal("hide"), table.ajax.reload(), Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "success", title: "Update Data Successfully" });
        },
    });
}
function tambahData() {
    var a = $("#category_name").val(),
        b = $("#category_status").val();
    $.ajax({
        url: "../admin/categories/add",
        type: "post",
        data: "category_name=" + a + "&category_status=" + b,
        dataType: "json",
        success: function (a) {
            200 == a.status && (table.ajax.reload(), $("#myModal").modal("hide"), Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "success", title: "Data Inserted Successfully" }));
        },
    });
    myDropzone.processQueue();
}
function deleteData(a) {
    Swal.fire({
        title: "Apakah anda yakin?",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: `Iya, Hapus saja!`,
        cancelButtonText: `Tidak, Batal!`,
        customClass: { confirmButton: "btn btn-danger mr-3", cancelButton: "btn btn-primary" },
        buttonsStyling: !1,
    }).then((b) => {
        b.isConfirmed
            ? $.ajax({
                  url: "../admin/categories/" + a,
                  type: "delete",
                  error: function (a) {
                      Swal.fire({ title: "Someting is wrong", icon: "warning", text: a });
                  },
                  success: function () {
                      table.ajax.reload(), Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "success", title: "Data Deteled Successfully" });
                  },
              })
            : Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "info", title: "Change are not save!", text: "Your data is saved!" });
    });
}
