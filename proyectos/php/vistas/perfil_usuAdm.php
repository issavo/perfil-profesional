<?php require_once("header.php"); ?>
<!-- Formulario datos -->
<div class="content-wrapper">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div id="resultados_ajax" style="margin-top: 10px;"></div>
        <div class="box" style="margin-top: 80px;">
            <div class="panel-header" style="margin-top: 10px; margin-left: 30px;">
                <img src="../public/dist/img/avatar6.png" width="150px" class="img-circle" alt="User Image">
            </div>
            <div class="panel-body">
                <form method="post" id="cliente_form" name="cliente_form" data-ajax="false" onsubmit="return false;" role="form">
                    <div class="content">
                        <div class="">
                            <label>Usuario</label>
                            <input type="email" name="usuario" id="usuario" class="form-control" disabled value="<?php echo $_SESSION["usuario"] ?>" />
                            <br />
                            <label>Password</label>
                            <input type="password" name="password1" id="password1" class="form-control" minlength="8" maxlength="12" required />
                            <br />
                            <label>Confirmar password</label>
                            <input type="password" name="password2" id="password2" class="form-control" required />
                            <br />
                            <div class="panel-footer text-center" style="background-color: transparent; border-top:none; padding: 0px;">
                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>" />
                                <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Guardar
                                </button>
                                <button type="button" onclick="limpiar()" class="btn btn-danger pull-right" data-dismiss="modal">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    Borrar
                                </button>
                            </div>
                        </div>
                </form>
            </div><!-- ./panel-body -->
        </div><!-- ./box-->
    </div><!-- ./col-sm-6 -->
    <div class="col-sm-4"></div>
</div><!-- ./content-wrapper -->
</div>
<!--row-->
</div>
<!--container-->
</div>
<?php require_once("footer.php"); ?>
<!-- SCRIPTS -->
<script src="js/admin/usuarios.js"></script>
</body>
</html>