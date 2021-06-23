$(document).on('click','#btn-edit',function(){
    $('.modal-body #id_penghuni').val($(this).data('id_penghuni'));
    $('.modal-body #nama_penghuni').val($(this).data('nama_penghuni'));
    $('.modal-body #no_ktp').val($(this).data('no_ktp'));
    $('.modal-body #unit').val($(this).data('unit'));
    $('.modal-body #foto').val($(this).data('foto')); 
})