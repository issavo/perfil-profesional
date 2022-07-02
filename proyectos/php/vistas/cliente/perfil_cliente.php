<?php require_once("header_cliente.php");?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <h2 class=" text-center mb-5">Datos personales</h2>
        <!-- contiene el formulario-->
        <div id="resultados_ajax"></div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="box">
                    <!-- centro -->
                    <div class="panel-header user-header" style="margin-top: 15px; margin-left: 90px;">
                        <img src="../../public/dist/img/avatar2.png" width="150px" class="img-circle" alt="User Image">
                    </div>
                    <form style="padding: 15px 50px;" method="post" id="form_perfil_cliente" name="form_perfil_cliente" data-ajax="false" onsubmit="return false" role="form">
                        <div class=" panel-body">
                            <label>Nombre</label>
                            <input type="text" name="nombre_perfil" id="nombre_perfil" class="form-control" required minlength="3" maxlength="30" />
                            <br />
                            <label>Apellidos</label>
                            <input type="text" name="apellidos_perfil" id="apellidos_perfil" class="form-control" required minlength="5" maxlength="30" />
                            <br />
                            <label>Dirección</label><br />
                            <textarea cols="110" rows="3" id="direccion_perfil" name="direccion_perfil" required minlength="10" maxlength="200">
                    				</textarea>
                            <br />
                            <label>Teléfono</label>
                            <input type="text" name="telefono_perfil" id="telefono_perfil" class="form-control" required minlength="9" maxlength="15" />
                            <br />
                            <label>Usuario</label>
                            <input type="email" name="usuario_perfil" id="usuario_perfil" class="form-control" maxlength="50" value="<?php echo $_SESSION["usuario"] ?>" required="required" disabled />
                            <br />
                            <label>Correo contacto</label>
                            <input type="email" name="correo_perfil" id="correo_perfil" class="form-control" required maxlength="50" />
                            <br />
                            <div class="panel-footer" style="background-color:transparent; border-top:none;">
                                <input type="hidden" name="id_cliente_perfil" id="id_cliente_perfil" value="" />
                                <input type="hidden" name="rol" id="rol" value="2" />
                                <input type="hidden" name="estado" id="estado" value="1" />

                                <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Guardar
                                </button>
                                <button type="reset" class="btn btn-danger pull-right" data-dismiss="modal">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    Borrar
                                </button>
                            </div><!-- ./panel-footer -->
                        </div>
                        <!-- ./panel-body -->
                    </form>
                </div><!-- ./box -->
            </div><!-- ./col-sm-6 -->
            <div class="col-sm-3"></div>
        </div><!-- ./row -->
    </section>
</div>
<!--content wrapper-->
</div>
<!--row-->
</div>
<!--container-->
</div>
<?php require_once("footer_cliente.php"); ?>
<!-- scripts -->
<script src="../js/cliente/perfil_cliente.js"></script>
<script>
    //al cargar la pagina mostrar los datos del cliente
    window.load = mostrar_perfil_cliente('<?php echo $_SESSION["usuario"] ?>');
</script>
</body>

</html>