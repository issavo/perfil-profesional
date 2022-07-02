<?php require_once("header.php");?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div id="resultados_ajax"></div>
        <h2>Listado proyectos</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">
                            <button class="btn btn-primary btn-md" onclick="limpiar();" id="add_button" data-toggle="modal" data-target="#proyectosModal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo proyecto</button>
                        </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                        <table id="proyectos_data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>T&iacute;tulo</th>
                                    <th>Subt&iacute;tulo</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Tecnolog&iacute;as</th>
                                    <th>Duraci&oacute;n</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    <th width="6%">Ver Foto </th>
                                </tr>
                            </thead>
                            <tbody> </tbody>   
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
<div id="proyectosModal" class="modal fade">
    <div class="modal-dialog tamanoModal">
        <form class="form-horizontal" method="post" id="proyectos_form" name="proyectos_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Proyecto</h4>
                </div>
                <div class="modal-body">
                    <section class="formulario-agregar_proyecto">
                        <div class="row">
                            <!--PRIMERA COLUMNA-->
                            <!--column-12 -->
                            <div class="col-lg-6">
                                <!-- Horizontal Form -->
                                <div class="box">
                                    <!-- box-body -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="" class="col-lg-1 control-label">Título</label>
                                            <div class="col-lg-9 col-lg-offset-1">
                                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-1 control-label">Subtítulo</label>
                                            <div class="col-lg-9 col-lg-offset-1">
                                                <input type="text" class="form-control" id="subtitulo" name="subtitulo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-1 control-label">Descripci&oacute;n</label>
                                            <div class="col-lg-9 col-lg-offset-1">
                                                <textarea name="descripcion" id="descripcion" cols="72" rows="10" minlength="20" maxlength="300" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-1 control-label">Tecnolog&iacute;as</label>
                                            <div class="col-lg-9 col-lg-offset-1">
                                                <input type="text" class="form-control" id="tecnologias" name="tecnologias" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-1 control-label">Duraci&oacute;n(h.)</label>
                                            <div class="col-lg-9 col-lg-offset-1">
                                                <input type="text" class="form-control" id="duracion" name="duracion" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg-1 control-label">Estado</label>
                                            <div class="col-lg-9 col-lg-offset-1">
                                                <select class="form-control" id="estado" name="estado" required>
                                                    <option value=""> Selecciona estado </option>
                                                    <option value="1" selected>Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!--/box-->
                            </div>
                            <!--/.col (6) -->
                            <!--SEGUNDA COLUMNA-->
                            <!--column-12 -->
                            <div class="col-lg-4 col-lg-offset-1">
                                <div class="form-group">
                                    <!-- imagen -->
                                    <div class="col-lg-9 col-lg-offset-1">
                                        <input type="file" id="proyecto_imagen" name="proyecto_imagen">
                                        <!-- mostrar imagen -->
                                        <br/><br/>
                                        <span id="proyecto_uploaded_image" class="text-center"></span>
                                    </div>
                                </div>
                                <!--/form-group-->
                            </div>
                            <!--/.col (4) -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!--section formulario - agregar- proyecto -->
                </div>
                <!--modal-body-->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-5 col-sm-8" >
                        <div class="modal-footer" style="border-top: none;" >
                            <input type="hidden" name="id_proyecto" id="id_proyecto" />
                            <button type="submit" name="action" id="#" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
                            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
                        </div>
                        <!--modal-footer-->
                    </div>
                </div>
                <!--row-->
            </div>
            <!--modal-content-->
        </form>
    </div>
</div>
<!--FIN FORMULARIO VENTANA MODAL-->
<?php require_once("footer.php");?>
<script text="text/javascript" src="js/admin/proyectos.js"></script>
