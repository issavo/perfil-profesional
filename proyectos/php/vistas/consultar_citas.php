<?php require_once("header.php"); ?>
<!-- HEADER - LIBRERIAS -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Consulta de citas
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="btn-group text-center">
          <a href="citas.php" id="add_button" class="btn btn-primary btn-md"><i class="fa fa-plus" aria-hidden="true"></i> Nueva cita</a>
        </div>
      </div>
    </div>
    <div id="resultados_ajax" class="alert"></div>
    <!--VISTA MODAL PARA VER DETALLE CITA EN VISTA MODAL-->
    <?php require_once("modal/detalle_cita_modal.php"); ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de citas</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="citas_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Detalles</th>
                  <th>Nº cita</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Teléfono</th>
                  <th>Cliente</th>
                  <th>Día</th>
                  <th>Hora</th>
                  <th>Fecha alta</th>
                  <th>Usuario alta</th>
                  <th>Estado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- MODAL PARA EDITAR CITA EN MODAL-->
<div class="modal fade" id="citaModal">
  <div class="modal-dialog tamanoModal">
    <div class="content-wrapper">
      <div class="modal-header box ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-calendar" aria-hidden="true"></i> Editar cita</h4>
      </div>
      <div class="modal-body">
        <section class="content">
          <section class="formulario_citas">
            <form class="form-horizontal" id="form_actualizar_citas" name="form_actualizar_citas" data-ajax="false" onsubmit="return false;" role="form">
              <!--FILA CLIENTE -->
              <div class="row">
                <div class="col-lg-12" style="padding-left: 0px;">
                  <div class="box" style="padding: 10px;">
                    <div class="box-body">
                      <div class="form-group">
                        <div class="col-lg-12">
                          <button type="button" id="#" class="btn btn-md btn-primary "><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Datos Cliente</button>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Número Cita</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="id_cita" name="id_cita" value="" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Nombre</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Apellidos</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="apellidos" name="apellidos" value="" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Teléfono</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="telefono" name="telefono" value="" required />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Usuario</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="usuario" name="usuario" value=""/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Día</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="dia" name="dia" required value="" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Hora</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="hora" name="hora" required value="" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-3 control-label">Fecha alta</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="fecha_alta" name="fecha_alta" value="" />
                        </div>
                      </div>
                     </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!--fin col-lg-8-->
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
                            <button type="button" id="#" class="btn btn-md btn-primary "><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; Datos Fecha</button>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="col-lg-5">
                            <label for="">Modificar Fecha cita: </label>
                            <input type="date" name="dia_modificar" id="dia_modificar" value="" required>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="col-lg-5">
                            <label for="">Modificar Hora cita: </label>
                            <select name="hora_modificar" id="hora_modificar" style="width: 100px;" required>
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
                        <div class="col-lg-2">
                          <div class="col-lg-5">
                            <label for="">Usuario Alta: </label>
                            <h5 id="usuario_alta" name="usuario_alta"><?php echo $_SESSION["usuario"]; ?></h5>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="col-lg-5">
                            <h5 class="text-center"><strong>Estado</strong></h5>
                            <select name="estado" id="estado" class="select" required>
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
                <!--fin col-sm-6-->
              </div>
              <!--fin row-->
              <div class="row">
                <div class="col-lg-12">
                  <div class="boton_registrar">
                    <button type="submit" onclick="" class=" btn btn-primary col-lg-offset-10 col-xs-offset-3" id="btn_editar"><i class="fa fa-save" aria-hidden="true"></i> Actualizar</button>
                  </div>
                </div>
              </div>
            </form>
          </section>
          <!--section formulario -->
        </section>
        <!-- /.content -->
      </div>
      <!--modal body-->
    </div>
    <!-- /.modal-content-wrapper -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php require_once("footer.php"); ?>
<!--AJAX CITAS-->
<script type="text/javascript" src="js/admin/citas.js"></script>