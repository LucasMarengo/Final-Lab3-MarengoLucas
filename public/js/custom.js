function deleteItem(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    event.preventDefault();
    if (confirm('¿Desea Eliminar el proveedor?')) {
        $.ajax({
            url: '/proveedores/' + id + '/delete',
            type: "DELETE",
            data: {
                id: id
            },
            success: function(data) {
                if (data['status']) {
                    $('#row-' + id).remove();
                    successMessage(data['msg']);
                }

            }
        });
    }
};


function successMessage(msg) {
    toastr.success(msg, '', {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    });
}
