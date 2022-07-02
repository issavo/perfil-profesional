<?php require_once("header.php"); ?>
<!-- INICIO DEL HEADER - LIBRERIAS -->
<?php
//llamada a la clase citas
require_once("../models/Citas.php");
$cita = new Citas();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Citas con clientes</h1>
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
          <div class="col-lg-8">
            <div class="box">
              <div class="box-body">
                <div class="form-group">
                  <div class="col-lg-6 col-lg-offset-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCliente"><i class="fa fa-search" aria-hidden="true"></i> Buscar Cliente</button>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Número Cita</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="id_cita" name="id_cita" value="" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Nombre</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Apellidos</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Dirección</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="direccion" name="direccion" required value="" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Teléfono</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="telefono" name="telefono" value="" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Usuario</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="usuario" name="usuario" value="" readonly />
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-lg-3 control-label">Correo</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="correo" name="correo" value="" readonly />
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
                      <button type="button" id="#" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#fechaModal"><i class="fa fa-search" aria-hidden="true"></i>  Consultar Fecha</button>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="col-lg-5">
                      <label for="">Fecha cita: </label>
                      <input type="date" name="dia" id="dia" value="">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="col-lg-5">
                      <label for="">Hora cita: </label>
                      <select name="hora" id="hora" style="width: 100px;">
                        <option value=""> --:-- </option>
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
                      <span class="text-center"><strong>Estado</strong></span>
                      <select name="estado" class=" col-xs-offset-2" id="estado" class="select" maxlength="10">
                        <option value="">SELECCIONE ESTADO</option>
                        <option value="1">Activa</option>
                        <option value="0">Anulada</option>
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
          <!--fin col-sm-12-->
        </div>
        <!--fin row-->
         <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="box-body">
                <div id="resultados_citas_ajax"></div>
                <input type="hidden" name="grabar" value="si">
                <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"]; ?>" />
                <input type="hidden" name="id_cliente" id="id_cliente" />
                <div class="boton_registrar">
                  <button type="button" onClick="registrarCitaCliente()" class="btn btn-primary col-lg-offset-10 col-xs-offset-3" id="btn_enviar"><i class="fa fa-save" aria-hidden="true"></i> Registrar Cita</button>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
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
<!--VISTA MODAL PARA AGREGAR CLIENTE-->
<?php require_once("modal/modal_lista_clientes.php"); ?>
<!--VISTA MODAL CONSULTAR FECHAS CITAS-->
<?php require_once("modal/modal_lista_fechas_clientes.php"); ?>
<!-- FOOTER - SCRIPTS  -->
<?php require_once("footer.php"); ?>
<!--AJAX CLIENTES-->
<script type="text/javascript" src="js/admin/clientes.js"></script>
<!--AJAX CITAS-->
<script type="text/javascript" src="js/admin/citas.js"></script>