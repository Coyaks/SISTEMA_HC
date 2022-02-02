$(document).ready(function () {
    $('#tablaUsuario').DataTable({
        //language: "public/lib/spanish_datatables.json",
        language: {
            "url": "public/lib/spanish_datatables.json"
        },
        "order": [],
        "serverSide": true,
        "ajax": {
            url: "UsuarioController/fetch",
            type: "POST",
        }
    });

    $('#btnNuevoUsuario').click(function () {
        $('#formUsuario').trigger('reset');
        $('.modal-title').text('Agregar Usuario');
        $('.modal-header').css('background-color', '#343a40');
        $('.modal-header').css('color', '#fff');
        $('#name_error').text('');
        $('#email_error').text('');
        $('#gender_error').text('');
        $('#action').val('Add');
        $('#submit_button').val('Add');
        $('#modalUsuario').modal('show');
    });

    // INSERT
    $('#formUsuario').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "UsuarioController/action",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            beforeSend: function () {
                $('#submit_button').val('wait...');
                $('#submit_button').attr('disabled', 'disabled');
            },
            success: function (data) {
                $('#submit_button').val('Add');
                $('#submit_button').attr('disabled', false);
                if (data.error == 'yes') {
                    $('#name_error').text(data.name_error);
                    $('#email_error').text(data.email_error);
                    $('#gender_error').text(data.gender_error);
                } else {
                    $('#modalUsuario').modal('hide');
                    $('#message').html(data.message);
                    $('#tablaUsuario').DataTable().ajax.reload();
                    setTimeout(function () {
                        $('#message').html('');
                    }, 5000);
                }
            }
        })
    });

    // UPDATE
    $(document).on('click', '.edit', function () {
        var id = $(this).data('id');
        $.ajax({
            url: "UsuarioController/fetch_single_data",
            method: "POST",
            data: {
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#name').val(data.nombre);
                $('#email').val(data.email);
                $('#gender').val(data.password);
                $('.modal-title').text('Editar Usuario');
                $('.modal-header').css('background-color', '#3164ff');
                $('.modal-header').css('color', '#fff');

                $('#name_error').text('');
                $('#email_error').text('');
                $('#gender_error').text('');
                $('#action').val('Edit');
                $('#submit_button').val('Edit');
                $('#modalUsuario').modal('show');
                $('#hidden_id').val(id);
            }
        })
    });

    //DELETE
    $(document).on('click', '.delete', function () {
        var id = $(this).data('id');
        Swal.fire({
            //title: 'Are you sure?',
            text: "¿Está seguro de eliminar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "UsuarioController/delete",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $('#message').html(data);
                        $('#tablaUsuario').DataTable().ajax.reload();
                        setTimeout(function () {
                            $('#message').html('');
    
                        }, 5000);
                    }
                })
            }
        })
    });
});