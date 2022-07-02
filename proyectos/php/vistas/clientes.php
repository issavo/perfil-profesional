<?php require_once("header.php"); ?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <h2>Listado clientes</h2>
        <div class="row">
            <div class="col-md-12">
                <div id="resultados_ajax"></div>
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">
                            <button class="btn btn-primary btn-md" onclick="limpiar();" id="add_button" data-toggle="modal" data-target="#clienteModal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo cliente</button>
                        </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                        <table id="cliente_data" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th width="20%">Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Usuario</th>
                                    <th>Correo</th>
                                    <th>rol</th>
                                    <th>Fecha alta</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!--Fin centro -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<!-- FORMULARIO VENTANA MODAL -->
<div id="clienteModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="cliente_form" onsubmit="return false;" data-ajax="false" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Agregar cliente</h4>
                </div>
                <div class="modal-body">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required minlength="3" maxlength="30" />
                    <br />
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" required minlength="3" maxlength="30" />
                    <br />
                    <label>Dirección</label>
                    <textarea cols="90" rows="3" id="direccion" name="direccion" required minlength="10" maxlength="200">
                    </textarea>
                    <br />
                    <label>Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required minlength="9" maxlength="15" />
                    <br />
                    <label>Usuario</label>
                    <input type="email" name="usuario" id="usuario" class="form-control" required="required" maxlength="50" />
                    <br />
                    <label>Correo de contacto</label>
                    <input type="email" name="correo" id="correo" class="form-control" required="required" maxlength="50" />
                    <br />
                    <label>Rol usuario</label>
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="">Selecciona tipo usuario</option>
                        <option value="1" selected>Administrador</option>
                        <option value="2">Cliente</option>
                        <option value="3">Usuario</option>
                    </select>
                    <br />
                    <label>Estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value=""> Selecciona estado </option>
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_cliente" id="id_cliente" />
                    <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Guardar
                    </button>
                    <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        Cerrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<?php require_once("footer.php");?>
<script text="text/javascript" src="js/admin/clientes.js"></script>