<?php
require_once("header_cliente.php"); ?>
<!-- HEADER - LIBRERIAS -->
<?php
//llamada a la clase citas
require_once("../../models/Citas.php");
$cita = new Citas();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -19px;">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 style="margin-top: 8px;">Citas</h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="panel panel-default">

      <div class="panel-body">

        <div class="btn-group text-center">
          <a href="consultar_citas.php" class="btn btn-primary btn-md"><i class="fa fa-search" aria-hidden="true"></i> Consultar citas</a>
        </div>

      </div>
    </div>
    <section class="formulario-citas">

      <form class="form-horizontal" id="form_citas">

        <!--FILA CLIENTE -->
        <div class="row">
          <div class="col-lg-6">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Número Cita</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="id_cita" name="id_cita" value="" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Nombre</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="nombre_perfil" name="nombre_perfil" value="" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Apellidos</label>

                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="apellidos_perfil" name="apellidos_perfil" value="" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Dirección</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="direccion_perfil" name="direccion_perfil" required value="" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Teléfono</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="telefono_perfil" name="telefono_perfil" value="" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Usuario</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="usuario_perfil" name="usuario_perfil" value="<?php echo $_SESSION["usuario"];?>" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Correo</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="correo_perfil" name="correo_perfil" value="" readonly />
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!--fin col-lg-12-->
        </div>
        <!--fin row-->
        <!--FILA- FECHA-->
        <div class="row">

          <div class="col-sm-12">

            <div class="box">

              <div class="box-body">

                <div class="row">

                  <div class="col-lg-2">
                    <div class="col-lg-5 text-center">
                      <button type="button" id="#" class="btn btn-sm btn-primary "><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; Datos Fecha</button>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="col-lg-5">
                      <label for="">Fecha cita: </label>
                      <input type="date" name="dia" id="dia" value="">
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="col-lg-5">
                      <label for="">Hora cita: </label>
                      <select name="hora" id="hora" style="width: 100px;">
                        <option value=""> --:--  </option>
                        <option value="">MAÑANAS</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:20:00">10:20</option>
                        <option value="10:40:00">10:40</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:20:00">11:20</option>
                        <option value="11:40:00">11:40</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:20:00">12:20</option>
                        <option value="12:40:00">12:40</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:20:00">13:20</option>
                        <option value="13:40:00">13:40</option>
                        <option value="">TARDES</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:20:00">16:20</option>
                        <option value="16:40:00">16:40</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:20:00">17:20</option>
                        <option value="17:40:00">17:40</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:20:00">18:20</option>
                        <option value="18:40:00">18:40</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:20:00">19:20</option>
                        <option value="19:40:00">19:40</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="col-lg-5">
                      <label for="">Usuario Alta: </label>
                      <h5 id="usuario_alta" name="usuario_alta"><?php echo $_SESSION["usuario"]; ?></h5>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="col-lg-5">
                      <h5 class="text-center"><strong>Estado cita</strong></h5>
                      <select name="estado" class="" id="estado" class="select">
                        <option value="1">  Activa  </option>   
                      </select>
                    </div>
                  </div>
                </div>
                <!--fin row-->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!--fin col-sm-6-->
        </div>
        <!--fin row-->
        <div class="row">
          <div class="col-sm-12">
            <div id="resultados_citas_ajax" class="alert"></div>
              <input type="hidden" name="grabar" value="si">
              <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"]; ?>" />
              <input type="hidden" name="id_cliente" id="id_cliente" />
              <div class="boton_registrar">
                <button type="button" onClick="registrarCitaCliente()" class="btn btn-primary col-lg-offset-10 col-xs-offset-3" id="btn_enviar"><i class="fa fa-save" aria-hidden="true"></i> Registrar Cita</button>
             </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </form>
      <!--formulario-citas-->
    </section>
    <!--section formulario - citas -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once("footer_cliente.php"); ?>
<!--AJAX CLIENTES-->
<script type="text/javascript" src="../js/cliente/perfil_cliente.js"></script>
<script>
  //al cargar la pagina mostrar los datos del cliente
  window.load = mostrar_perfil_cliente('<?php echo $_SESSION["usuario"] ?>');
</script>
<!--AJAX CITAS ADMINISTRADOR-->
<script type="text/javascript" src="../js/admin/citas.js"></script>
<!--AJAX CITAS CLIENTES-->
<script type="text/javascript" src="../js/cliente/citas_cliente.js"></script>