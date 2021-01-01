var table;
var base = window.location.origin;
$(document).ready(function () {
    table = $("#table-product").DataTable({
        ajax: { url: "../admin/products/show", dataSrc: "results", dataType: "json", type: "GET" },
        responsive: !0,
        bInfo: !1,
        lengthMenu: [
            [5, 10, 25],
            [5, 10, 25],
        ],
        lengthChange: !0,
        bProcessing: !0,
        retrieve: !0,
        language: { processing: "Sedang memuat data..", decimal: ",", thousands: "." },
        columns: [
            {
                data: null,
                sortable: !1,
                render: function (a, b, c, d) {
                    return d.row + 1;
                },
            },
            { data: "sku" },
            { data: "name" },
            { data: "category_name" },
            { data: "harga_baru", render: $.fn.dataTable.render.number(",", ".", 2, "Rp ") },
            { data: "stok" },
            {
                data: 'berat',
                mRender: function(data){
                    if(data == null){
                        return 0 + ' gram';
                    }else{
                        return data + ' gram';
                    }
                }
            },
            {
                data: "product_status",
                mRender: function (a) {
                    return "ACTIVE" == a ? `<a class='btn btn-info btn-sm'><i class="fas fa-check-circle mr-2"></i>` + a + `</a>` : `<a class='btn btn-danger'><i class="fas fa-times-circle mr-2"></i>` + a + `</a>`;
                },
            },
            {
                data: "sku",
                render: function (a) {
                    return (
                        `
                        <a href="`+base+`/admin/products/images/`+a+`" class="btn btn-secondary btn-sm"><i class="fas fa-images"></i><span><br>Picture</span></a>
                        <a data-toggle="modal" onclick="submit(` +a +`)" class="btn btn-success btn-sm" data-target="#myModal" ><i class="fas fa-edit"></i><span><br>Edit</span></a> 
                        <a class="btn btn-danger btn-sm" onclick="deleteData(` +a +`)"><i class="fas fa-trash-alt"></i><span><br>Hapus</span></a>
                        `
                    );
                },
            },
        ],
    });
});
function submit(a) {
    $("#product_id").val(""),
        $("#sku").val(""),
        $("#name").val(""),
        $("#category_id").val(""),
        $("#category_id").empty(),
        $("#harga").val(""),
        $("#stok").val(""),
        $("#status").val(""),
        $('#berat').val(''),
        $('#detail').val(''),
        "tambah" == a
            ? ($("#myModalTitle").text("Tambah Data"),
              $("#btn-tambah").show(),
              $("#btn-ubah").hide(),
              $.ajax({
                  url: "../admin/categories/active",
                  type: "get",
                  dataType: "json",
                  success: function (a) {
                      $.each(a.results, function (a, b) {
                          $("#category_id").append(
                              `
                        <option value='` +
                                  b.category_id +
                                  `'>` +
                                  b.category_name +
                                  `</option>
                    `
                          );
                      });
                  },
              }))
            : ($("#myModalTitle").text("Ubah Data"),
              $("#btn-tambah").hide(),
              $("#btn-ubah").show(),
              $.ajax({
                  url: "../admin/products/" + a,
                  type: "get",
                  dataType: "json",
                  success: function (a) {
                      $.each(a.category, function (a, b) {
                          $("#category_id").append(
                              `
                            <option value='` +
                                  b.category_id +
                                  `'>` +
                                  b.category_name +
                                  `</option>
                            `
                          );
                      }),
                          $.each(a.product, function (a, b) {
                              $("#product_id").val(b.product_id), $("#sku").val(b.sku), $("#name").val(b.name), $("#category_id").val(b.category_id), $("#harga").val(b.harga_baru), $("#stok").val(b.stok), $('#berat').val(b.berat == null? 0: b.berat),$("#status").val(b.product_status),$('#detail').val(b.detail);
                          });
                  },
                  error: function (a) {
                      console.log(a);
                  },
              }));
}
function updateData() {
    var a = $("#product_id").val(),
        b = $("#sku").val(),
        c = $("#name").val(),
        d = $("#category_id").val(),
        e = $("#harga").val(),
        f = $("#stok").val(),
        g = $("#status").val(),
        h = $('#berat').val(),
        i = $('#detail').val(); 
    $.ajax({
        url: "../admin/products/update/" + a,
        type: "post",
        data: "sku=" + b + "&name=" + c + "&category_id=" + d + "&harga=" + e + "&stok=" + f + "&status=" + g + '&berat=' + h + '&detail=' + i,
        dataType: "json",
        success: function () {
            $("#myModal").modal("hide"), table.ajax.reload(), Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "success", title: "Update Data Successfully" });
        },
        error: function (a) {
            console.log(a);
        },
    });
}
function tambahData() {
    var a = $("#sku").val(),
        b = $("#name").val(),
        c = $("#category_id").val(),
        d = $("#harga").val(),
        e = $("#stok").val(),
        f = $("#status").val(),
        g = $('#berat').val(),
        h = $('#detail').val();

    $.ajax({
        url: "../admin/products/add",
        type: "post",
        data: "sku=" + a + "&name=" + b + "&category_id=" + c + "&harga=" + d + "&stok=" + e + "&status=" + f + "&berat=" + g + "&detail=" + h,
        dataType: "json",
        success: function (a) {
            200 == a.status && (table.ajax.reload(), $("#myModal").modal("hide"), Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "success", title: "Data Inserted Successfully" }));
        },
    });
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
                  url: "../admin/products/" + a,
                  type: "delete",
                  error: function (a) {
                      Swal.fire({ title: "Someting is wrong", icon: "warning", text: a });
                  },
                  success: function () {
                      table.ajax.reload(), Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "success", title: "Data Deleted Successfully" });
                  },
              })
            : Swal.fire({ toast: !0, position: "top-end", showConfirmButton: !1, timer: 3e3, icon: "info", title: "Change are not save!", text: "Your data is saved!" });
    });
}
