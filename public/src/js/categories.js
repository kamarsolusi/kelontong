var table;$(document).ready(function(){table=$("#table-category").DataTable({ajax:{url:"../admin/categories/show",dataSrc:"results"},responsive:!0,bInfo:!1,lengthMenu:[[5,10,25],[5,10,25]],lengthChange:!0,bProcessing:!0,retrieve:!0,language:{processing:"Sedang memuat data.."},columns:[{data:null,sortable:!1,render:function(a,b,c,d){return d.row+1}},{data:"category_name"},{data:"category_status",mRender:function(a){return"ACTIVE"==a?`<a class='btn btn-success'>`+a+`</a>`:`<a class='btn btn-danger'>`+a+`</a>`}},{data:"category_id",render:function(a){return`<a data-toggle="modal" onclick="submit(`+a+`)" class="btn btn-success" data-target="#myModal" ><i class="fas fa-edit"></i>Edit</a> <a class="btn btn-danger" onclick="deleteData(`+a+`)"><i class="fas fa-trash-alt"></i>Hapus</a>`}}]})});function submit(a){$("#category_name").val(""),$("#category_status").val(""),"tambah"==a?($("#myModalTitle").text("Tambah Data"),$("#btn-tambah").show(),$("#btn-ubah").hide()):($("#myModalTitle").text("Ubah Data"),$("#btn-tambah").hide(),$("#btn-ubah").show(),$.ajax({url:"<?= base_url(); ?>/admin/categories/"+a,type:"get",dataType:"json",success:function(a){$("#category_id").val(a.category_id),$("#category_name").val(a.category_name),$("#category_status").val(a.category_status)}}))}function updateData(){var a=$("#category_id").val(),b=$("#category_name").val(),c=$("#category_status").val();$.ajax({url:"../admin/categories/update/"+a,type:"post",data:"category_name="+b+"&category_status="+c,dataType:"json",success:function(a){console.log(a),$("#myModal").modal("hide"),table.ajax.reload(),Swal.fire({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3,icon:"success",title:"Update Data Successfully"})}})}function tambahData(){var a=$("#category_name").val(),b=$("#category_status").val();$.ajax({url:"../admin/categories/add",type:"post",data:"category_name="+a+"&category_status="+b,dataType:"json",success:function(a){200==a.status&&(table.ajax.reload(),$("#myModal").modal("hide"),Swal.fire({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3,icon:"success",title:"Data Inserted Successfully"}))}})}function deleteData(a){Swal.fire({title:"Apakah anda yakin?",icon:"warning",showCancelButton:!0,confirmButtonText:`Iya, Hapus saja!`,cancelButtonText:`Tidak, Batal!`,customClass:{confirmButton:"btn btn-danger mr-3",cancelButton:"btn btn-primary"},buttonsStyling:!1}).then(b=>{b.isConfirmed?$.ajax({url:"../admin/categories/"+a,type:"delete",error:function(a){Swal.fire({title:"Someting is wrong",icon:"warning",text:a})},success:function(){table.ajax.reload(),Swal.fire({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3,icon:"success",title:"Data Deteled Successfully"})}}):Swal.fire({toast:!0,position:"top-end",showConfirmButton:!1,timer:3e3,icon:"info",title:"Change are not save!",text:"Your data is saved!"})})}