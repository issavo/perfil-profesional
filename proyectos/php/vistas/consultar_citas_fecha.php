
<?php require_once("header.php"); ?>
<!--HEADER - LIBRERIAS -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta de Citas por fecha</h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div id="resultados_ajax"></div>
    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-inline">
          <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Inicial</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Fecha Inicial">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-sm-2 col-form-label">Fecha Final</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="datepicker2" name="datepicker2" placeholder="Fecha Final">
            </div>
          </div>
          <div class="btn-group text-center">
            <button type="button" class="btn btn-primary" id="btn_cita_fecha"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
          </div>
        </form>
      </div>
    </div>
    <!--VISTA MODAL PARA VER DETALLE CITA EN VISTA MODAL-->
    <?php require_once("modal/detalle_cita_modal.php"); ?>
    <div class="row">
      <div class="col-xs-12">
       <div class="table-responsive">
          <div class="box-header">
            <h3 class="box-title">Listado de Compras por fecha</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="citas_fecha_data" class="table table-bordered table-striped text-center">
              <thead>
                <tr style="background-color:#A9D0F5">
                  <th class="all">Ver Detalle</th>
                  <th class="all">Nº cita</th>
                  <th class="all">Nombre</th>
                  <th class="all" width="8%">Apellidos</th>
                  <th class="min-desktop">Teléfono</th>
                  <th class="min-desktop">Cliente</th>
                  <th class="min-desktop">Día</th>
                  <th class="min-desktop">Hora</th>
                  <th class="min-desktop">Fecha alta</th>
                  <th class="min-desktop">usuario alta</th>
                  <th class="min-desktop">Estado</th>
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
<?php require_once("footer.php"); ?>
<!--AJAX CITAS-->
<script type="text/javascript" src="js/admin/citas.js"></script>
<!--AJAX CONSULTAS CITAS-->
<script type="text/javascript" src="js/admin/consultas_citas.js"></script>