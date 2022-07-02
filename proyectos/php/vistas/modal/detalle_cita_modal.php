<div class="modal fade" id="detalle_cita">
  <div class="modal-dialog tamanoModal">
    <div class="bg-warning" style="width: 1000px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; DETALLE CITA</h4>
      </div>
      <div class="modal-body">

        <div class="container box">

          <!--column-12 -->
          <div class="table-responsive">

            <div class="box-body">

              <table id="detalle_cliente" class="table table-striped table-bordered table-condensed table-hover text-center">

                <thead style="background-color:#A9D0F5">
                  <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Cliente</th>
                  </tr>
                </thead>

                <tbody>

                  <td>
                    <h5 id="nombreModal"></h5><input type="hidden" name="nombreModal" id="nombreModal">
                  </td>
                  <td>
                    <h5 id="apellidosModal"></h5><input type="hidden" name="apellidosModal" id="apellidosModal">
                  </td>
                  <td>
                    <h5 id="telefonoModal"></h5><input type="hidden" name="telefonoModal" id="telefonoModal">
                  </td>
                  <td>
                    <h5 id="usuarioModal"></h5><input type="hidden" name="usuarioModal" id="usuarioModal">
                  </td>

                </tbody>

              </table>
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover text-center">
                  <thead style="background-color:#A9D0F5">
                    <th width="8%">Nº cita</th>
                    <th>Cliente</th>
                    <th>Día</th>
                    <th>Hora</th>
                    <th width="10%">Fecha alta</th>
                    <th width="8%">Usuario alta</th>
                    <th>Estado</th>
                  </thead>
                  <tbody>
                    <td>
                      <h5 id="id_citaModal"></h5><input type="hidden" name="id_citaModal" id="id_citaModal">
                    </td>
                    <td>
                      <h5 id="clienteModal"></h5><input type="hidden" name="clienteModal" id="clienteModal">
                    </td>
                    <td>
                      <h5 id="diaModal"></h5><input type="hidden" name="diaModal" id="diaModal">
                    </td>
                    <td>
                      <h5 id="horaModal"></h5><input type="hidden" name="horaModal" id="horaModal">
                    </td>
                    <td>
                      <h5 id="fecha_altaModal" width="8%"></h5><input type="hidden" name="fecha_altaModal" id="fecha_altaModal">
                    </td>
                    <td>
                      <h5 id="usuario_altaModal"></h5><input type="hidden" name="usuario_altaModal" id="usuario_altaModal">
                    </td>
                    <td>
                      <h5 id="estadoModal"></h5><input type="hidden" name="estadoModal" id="estadoModal">
                    </td>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <!--BOTON CERRAR DE LA VENTANA MODAL-->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
            </div>
            <!--modal-footer-->
          </div>
          <!--/.col (12) -->
        </div>
        <!-- /.row -->
      </div>
      <!--modal body-->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->