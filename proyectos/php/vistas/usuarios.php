<?php require_once("header.php");?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div id="resultados_ajax" style="margin-top: 10px;"></div>
    <h2>Listado usuarios</h2>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title">
              <button class="btn btn-primary btn-md" onclick="limpiar();" id="add_button" data-toggle="modal" data-target="#usuarioModal">
                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo usuario</button>
            </h1>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive">
            <table id="usuario_data" class="table table-bordered table-striped text-center">
              <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Contraseña</th>
                  <th>Rep. contraseña</th>
                  <th>rol</th>
                  <th width="8%">Fecha alta</th>
                  <th>Estado</th>
                  <th >Editar</th>
                  <th >Eliminar</th>
                </tr>
              </thead>
              <tbody></tbody>  
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
<div id="usuarioModal" class="modal fade">
  <div class="modal-dialog">
    <form action="" method="post" id="usuario_form">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">
            &times;
          </button>
          <h4 class="modal-title">Agregar usuario</h4>
        </div>
        <div class="modal-body">
          <label>Usuario</label>
          <input type="email" name="usuario" id="usuario" class="form-control" maxlength="50"  required="required" />
          <br />
          <label>Password</label>
          <input type="password" name="password1" id="password1" class="form-control" minlength="8" maxlength="12"  required />
          <br />
          <label>Repita Password</label>
          <input type="password" name="password2" id="password2" minlength="8" maxlength="12" class="form-control" required />
          <br />
          <label>Rol usuario</label>
          <select class="form-control" id="rol" name="rol" required>
            <option value="">Selecciona tipo usuario</option>
            <option value="1" selected>Administrador</option>
            <option value="2">Cliente</option>
            <option value="3" selected>Usuario</option>
          </select>
          <br />
          <label>Estado</label>
          <select class="form-control" id="estado" name="estado" required>
            <option value=""> Selecciona estado </option>
            <option value="1" selected>Activo</option>
            <option value="0">Inactivo</option>
          </select>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_usuario" id="id_usuario" />
          <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Guardar
          </button>
          <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cerrar
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<?php require_once("footer.php");?>
<script text="text/javascript" src="js/admin/usuarios.js"></script>