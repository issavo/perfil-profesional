<div class="modal fade" id="modalCliente">
  <div class="modal-dialog tamanoModal">
    <div class="bg-warning">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-user-circle" aria-hidden="true"></i> Seleccione un cliente</h4>
      </div>
      <div class="modal-body">

        <div class="container box">

          <!--column-12 -->
          <div class="table-responsive">
            <div class="box-body">
              <table id="lista_clientes_data" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="all">Nombres</th>
                    <th class="all">Apellidos</th>
                    <th class="min-desktop">Dirección</th>
                    <th class="min-desktop">Teléfono</th>
                    <th class="min-desktop">Usuario</th>
                    <th class="min-desktop">Correo</th>
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