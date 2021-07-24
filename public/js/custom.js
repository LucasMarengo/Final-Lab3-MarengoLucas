function deleteItem(id, route, name) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    event.preventDefault();
    Swal.fire({
        title: '¿Estas Seguro que deseas eliminar "' + name + '"',
        text: "Sera eliminado de " + route + " por siempre.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/' + route + '/' + id + '/delete',
                type: "DELETE",
                data: {
                    id: id
                },
                success: function (data) {
                    if (data['status']) {
                        $('#row-' + id).remove();
                        successMessage(data['msg']);
                    }

                }
            });
        }
    })
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
