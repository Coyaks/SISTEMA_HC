<!-- EXTENDER LA PLANTILLA PRINCIPAL -->
<?= $this->extend('layout/plantillabase') ?>

<!-- SECCIONES -->
<?= $this->section('title') ?>
Usuario
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<!-- DATATABLES + B4 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/css/estilosUsuario.css">

<?= $this->endSection() ?>


<?= $this->section('contenido') ?>
<div class="container-fluid">
    <!-- CARD -->
    <!-- <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-right">
                    <button type="button" name="add_record" id="btnNuevoUsuario" class="btn btn-success btn-sm rounded-pill"><i class="fas fa-plus"></i> Nuevo</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tablaUsuario" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> -->

    <fieldset class="border-fielset p-2">
        <legend class="w-auto text-primary">
            <h3 class="m-0">Usuarios</h3>
        </legend>
        <div class="row mb-3">
            <div class="col-lg-12">
                <button type="button" name="add_record" id="btnNuevoUsuario" class="btn btn-success btn-sm rounded-pill"><i class="fas fa-plus"></i> Nuevo</button>
            </div>
        </div>

        <div class="table-responsive">
            <table id="tablaUsuario" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </fieldset>
</div>

<!-- Modal Usuario-->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- inicio de form -->
        <form id="formUsuario">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <!-- <span class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </span> -->
                    <img src="<?php echo base_url('assets/img/close.png')?>" alt="close" class="close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" />
                        <span id="name_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                        <span id="email_error" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" id="password">
                        <span id="gender_error" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- HIDDEN -->
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Add" />

                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                    <button type="submit" name="submit" id="submit_button" class="btn btn-success"><i class="fal fa-save"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/mainCrudUsuario.js') ?>"></script>

<?= $this->endSection() ?>