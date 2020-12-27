var qty = 0;
var subtotal = 0;
var grandTotal = 0;
var idCart =0;
var tax = 0;

function totalBeli(){
    grandTotal = 0;
    $('.sub-total').each(function(){
        var val = $.trim($(this).text());

        if(val){
            val = parseFloat( val.replace( /^\Rp./,"")) * 1000;
            grandTotal += val;
        }
    })
    $('#grand-total').text('Rp. ' + Intl.NumberFormat('id').format(grandTotal));
    pajak();
}
$(document).ready(function(){
    table = $("#cart-body").DataTable({
        ajax: { url: "../carts/show", dataSrc:'results' ,dataType: "json", method: "GET" },
        responsive: !0,
        bInfo: !1,
        paging: false,
        lengthChange: false,
        ordering: false,
        processing: false,
        serverSide: false,
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
            { data: "name" },
            { 
                data: "qty" ,
                mRender: function(data,type,row){
                    var disable = data == 1? 'disabled' : '';
                    return `<a onclick='minus(`+row.cart_id+`)' class='btn btn-danger text-light btn-sm `+disable+`' id='minus-`+row.cart_id+`'> - </a>
                     <a id='qty-`+row.cart_id+`' class='text-light btn btn-primary'>` +data+`</a> 
                     <a  onclick='plus(`+row.cart_id+`)' class='btn btn-success text-light btn-sm'> + </a>`
                }
            },
            { 
                data: "harga_baru",
                mRender: function(data, type, row, meta){
                    return `<p id='harga-`+row.cart_id+`'>`+row.harga_baru+`</p>`
                }
            },
            { 
                data: "harga_baru",
                mRender: function(data, type, row, meta){             
                    return "<b class='sub-total' id='sub-total-"+row.cart_id+"' >Rp. "+  meta.settings.fnFormatNumber(row.harga_baru * row.qty) + "</b>";
                },
            },
            {
                data: "cart_id",
                render: function (data) {
                    return (
                        `
                        <a class="btn btn-danger text-light" onclick="deleteData(` +data +`)"><i class="fas fa-trash-alt"></i> Hapus</a>
                        `
                    );
                },
            },
        ],
        initComplete:function(setting, json){
            totalBeli();
        }
    });

})


function minus(id){ 
    
    qty= $('#qty-'+id).text();
    idCart = id;
    var harga = $('#harga-'+id).text();
    qty--;
    $.ajax({
        url: '../carts/'+id,
        data: 'qty='+qty,
        method: 'post',
        dataType: 'json',
        success: function(response){
            $('#qty-'+id).text(qty);
            subtotal = qty * harga;
            $('#sub-total-'+id).text('Rp. ' + Intl.NumberFormat('id').format(subtotal));
    
            if(qty == 1){
                $('#minus-'+id).addClass('disabled');
            }
            totalBeli();
        }
    })

}

function plus(id){
    qty= $('#qty-'+id).text();
    var harga = $('#harga-'+id).text();
    qty++;
    $.ajax({
        url: '../carts/'+id,
        data: 'qty='+qty,
        method: 'post',
        dataType: 'json',
        success: function(response){
            $('#qty-'+id).text(qty);
            subtotal = qty * harga;
            $('#sub-total-'+id).text('Rp. ' + Intl.NumberFormat('id').format(subtotal));
            $('#minus-'+id).removeClass('disabled');
            totalBeli();
        }
    })
}

function pajak(){
    tax = grandTotal * (10/100);
    $('#tax').text('Rp. ' + Intl.NumberFormat('id').format(tax));
    totalBayar();
}

function totalBayar(){
    var totalBayar = grandTotal + tax;
    $('#total-bayar').text('Rp. ' + Intl.NumberFormat('id').format(totalBayar));
}

function deleteData(id){
    $.ajax({
        url: '../carts/' + id,
        method: 'delete',
        dataType: 'json',
        success: function(response){
            if(response['status']==200){
                table.ajax.reload();
                shoppingCart();
                totalBeli();
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    title: 'Deleted Successfully !',
                    timer: 3000,
                })
            }
        }
    })
}