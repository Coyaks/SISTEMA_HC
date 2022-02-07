$(document).ready(function () {
    $('#tablaUsuario').DataTable({
        language: {
            "url": "assets/lib/spanish_datatables.json"
        },
        "order": [],
        "serverSide": true,
        "ajax": {
            url: "UsuarioController/fetch",
            type: "POST",
        },
        "lengthMenu": [
            [5, 10, 50, -1],
            [5, 10, 50, "All"]
        ],
        //Botones para exportar
        dom: "B<'row'<'col-sm-12 col-md-6 mt-2'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [{
                "extend": 'copyHtml5',
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary mr-2",
            },
            {
                "extend": 'excelHtml5',
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Exportar a Excel",
                "className": "btn btn-success mr-2",
            },
            {
                "extend": 'pdfHtml5',
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr": "Exportar a PDF",
                "className": "btn btn-danger mr-2",
            },
            {
                "extend": 'csvHtml5',
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info mr-2",
            },
            {
                "extend": 'print',
                "text": "<i class='fas fa-print'></i> Imprimir",
                "titleAttr": "Imprimir archivo",
                "className": "btn btn-secondary",
            }
        ]
    });

    $('#btnNuevoUsuario').click(function () {
        $('#formUsuario').trigger('reset');
        $('.modal-title').text('Agregar Usuario');
        $('.modal-header').css('background-color', '#343a40');
        $('.modal-header').css('color', '#fff');
        // validacion errors
        $('#name_error').text('');
        $('#email_error').text('');
        $('#gender_error').text('');

        $('#action').val('Add');
        $('#btnGuardar').val('Add');
        $('#modalUsuario').modal('show');
    });

    // INSERT
    $('#formUsuario').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            url: "UsuarioController/action",
            method: "POST",
            data: $(this).serialize(),
            dataType: "JSON",

            // beforeSend: function () {
            // },
            success: function (data) {
                if (data.error == 'yes') {
                    $('#name_error').text(data.name_error);
                    $('#email_error').text(data.email_error);
                    $('#gender_error').text(data.gender_error);
                } else {
                    $('#modalUsuario').modal('hide');
                    $('#tablaUsuario').DataTable().ajax.reload();
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
                $('#btnGuardar').val('Edit');
                // abrir modal con datos cargados para editar
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