var qty = 0;
var subtotal = 0;
var grandTotal = 0;
var idCart =0;
var totalPajak = 0;

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
    pajak(grandTotal);
}

$(document).ready(function(){
    
    if($('#logged_in').val()){
        $.ajax({
            url: window.location.origin + '/carts/show',
            method: 'get',
            dataType: 'json',
            success: function(response){
                $.each(response['results'], function(key, value){
                    console.log(value);
                    $('#keranjang').append(`
                        <div class="cart-shop">
                            <img src="assets/img/anggur.jpg" alt="" class="img-shop">
                            <div class="product-name">
                                <a href="#" class="title-shop">Anggur Impor 1 Kg</a>
                                <div class="price-shop">
                                    <h6 class="slash-price">Rp 100.000</h6>
                                    <h6 class="final-price">Rp 60.000</h6>
                                </div>
                            </div>
                            <div class="cart-other">
                                <div class="note">
                                    <!-- <h4 class="button-note">Tulis Catatan</h4> -->
                                    <div class="input-group">
                                        <input type="text" class="form-control form-note" placeholder="Tulis Catatan (Optional)">
                                    </div>
                                </div>
                                <div class="cart-qty">
                                    <span class="button-delete">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <div class="number-cart">
                                        <span class="minus-cart">-</span>
                                        <input type="number" value="1" class="input-jumlah" />
                                        <span class="plus-cart">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                })
            }
        })
    }else{
        console.log("b");
    }

})



function minus(id){ 
    
    qty= $('#qty-'+id).text();
    idCart = id;
    var harga = $('#harga-'+id).text();
    harga = parseFloat(harga.replace( /^\Rp./,"")) * 1000;
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
    var harga =  $('#harga-'+id).text();
    harga = parseFloat(harga.replace( /^\Rp./,"")) * 1000;
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

function pajak(total){
    totalPajak = total * (10/100);
    $('#tax').text('Rp. ' + Intl.NumberFormat('id').format(totalPajak));
    totalBayar(totalPajak, total);
}

function totalBayar(biayapajak, total){
    var totalBayar = total + biayapajak;
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
                    showConfirmButton: false
                })
            }
        }
    })
}