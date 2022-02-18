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
    <span id="message">hola</span>
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
                <!-- SIN tbody -->
            </table>
        </div>
    </fieldset>
</div>

<!-- Modal Usuario-->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- inicio de form -->
        <form id="formUsuario">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <!-- icon close custom -->
                    <img src="<?php echo base_url('assets/img/close.png') ?>" alt="close" class="close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                                <!-- validacion elegante -->
                                <span id="name_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="">
                                <span id="apellidos_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">

                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password" id="password" placeholder="">
                                <span id="password_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" class="">Rol</label>
                                <select name="rol" id="rol" class="form-control">
                                    <option value="">-- Seleccione --</option>
                                </select>
                            </div>
                            <span id="rol_error" class="text-danger"></span>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="rol" id="rol" class="form-control">
                                    <option value="">-- Seleccione --</option>
                                </select>
                            </div>
                            <span id="rol_error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- HIDDEN -->
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Add" />

                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>

                    <!-- OJO: button tambien tine value="Add" or "Edit" -->
                    <button type="submit" name="submit" id="btnGuardar" class="btn btn-success"><i class="fal fa-save"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/mainCrudUsuario.js') ?>"></script>
<?= $this->endSection() ?>