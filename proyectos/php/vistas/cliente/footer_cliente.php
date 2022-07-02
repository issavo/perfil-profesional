<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="../../inicio2.php">pages.com</a>.</strong> All rights
    reserved.
</footer>
<!-- jQuery 3 -->
<script src="../../public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../public/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="../../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>


<!-- Morris.js charts -->
<script src="../../public/bower_components/raphael/raphael.min.js"></script>
<script src="../../public/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../public/bower_components/moment/min/moment.min.js"></script>
<script src="../../public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../public/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../public/dist/js/demo.js"></script>
<!-- BOOTBOX -->
<script src="../js/bootbox.min.js"></script>
<!--BOOTSTRAP FILE STYLE-->
<script src="../../public/bootstrap-filestyle/src/bootstrap-filestyle.min.js"></script>
<script>
    //PROYECTO$
    $(":file").filestyle({
        input: false,
        buttonText: "Agregar Imagen",
        buttonName: "btn-primary"
    });
</script>
<!--CAMPO FECHA - DATEPICKER - CITAS-->
<script>
    $('#da').datepicker({
        /*dateFormat: 'dd-mm-yy',
        autoclose: true*/
        format: "dd/mm/yyyy",
        /*clearBtn: true,
        language: "es",*/
        autoclose: true,
        /*keyboardNavigation: false,
        todayHighlight: true*/
    })


    /*EN EL SEGUNDO CAMPO DEL ARCHIVO CONSULTAR CITAS FECHA*/
    $('#datepicker2').datepicker({
        /*dateFormat: 'dd-mm-yy',
        autoclose: true*/
        format: "dd/mm/yyyy",
        clearBtn: true,
        language: "es",
        autoclose: true,
        keyboardNavigation: false,
        todayHighlight: true
    });
</script>
</body>

</html>