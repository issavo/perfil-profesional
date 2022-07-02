<?php
require_once("header.php");

?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div id="resultados_ajax"></div>
        <h2>Listado noticias</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">
                            <button class="btn btn-primary btn-md" onclick="limpiar();" id="add_button" data-toggle="modal" data-target="#noticiasModal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Nueva noticia</button>
                        </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                        <table id="noticias_data" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>T&iacute;tulo</th>
                                    <th>Subt&iacute;tulo</th>
                                    <th>Texto</th>
                                    <th>Tecnolog&iacute;as</th>
                                    <th>Usuario</th>
                                    <th width="8%">Fecha alta</th>
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
<div id="noticiasModal" class="modal fade">
    <div class="modal-dialog">
        <form action="" method="post" id="noticias_form" name="noticias_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title">Agregar noticia</h4>
                </div>
                <div class="modal-body">
                    <label>T&iacute;tulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required />

                    <br />

                    <label>Subt&iacute;tulo</label>
                    <input type="text" name="subtitulo" id="subtitulo" class="form-control" required />
                    <br />
                    <label>Texto</label>
                    <textarea cols="90" rows="3" id="texto" name="texto" required>
                    </textarea>
                    <br>

                    <label>Usuario</label>
                    <input type="email" name="usuario" id="usuario" class="form-control" required />
                    <br />

                    <label>Tecnolog&iacute;as</label>
                    <input type="text" name="tecnologias" id="tecnologias" class="form-control" required />
                    <label>Estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="">-- Selecciona estado --</option>
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_noticia" id="id_noticia" />
                <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                    Guardar
                </button>
                <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    Cerrar
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once("footer.php"); ?>
<script text="text/javascript" src="js/admin/noticias.js"></script>