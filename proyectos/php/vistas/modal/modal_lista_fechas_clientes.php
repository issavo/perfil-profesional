<div class="modal fade" id="fechaModal">
  <div class="modal-dialog tamanoModal">
    <div class="bg-warning">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-user-circle" aria-hidden="true"></i> Consultar fecha</h4>
      </div>
      <div class="modal-body">
        <!-- SELECCIONAR FECHA FORM -->
        <!--column-12 -->
        <!--tabla fechas -->
        <div class="row">
          <div class="container box">
            <div class="table-responsive">
              <div class="box-body">
                <table id="lista_citas_data" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="all">Nº cita</th>
                      <th class="all">Nombres</th>
                      <th class="all">Apellidos</th>
                      <th class="min-desktop">Teléfono</th>
                      <th class="min-desktop">Cliente</th>
                      <th class="min-desktop">Día</th>
                      <th class="min-desktop">Hora</th>
                      <th class="min-desktop">Fecha alta</th>
                      <th class="min-desktop">Usuario alta</th>
                      <th class="min-desktop">Estado</th>
                      <th class="min-desktop">Acción</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.box-body -->

              <!--BOTON CERRAR DE LA VENTANA MODAL-->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
              </div>
              <!--modal-footer-->
            </div>
          </div>
        <!--/.box -->
        </div>
        <!-- /.row -->
        <!-- /.column (12) -->
      </div>
      <!--modal body-->
    </div>
    <!-- /.bg-warning -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->