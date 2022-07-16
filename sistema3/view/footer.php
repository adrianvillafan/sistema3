  </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; <?php echo date("Y"); ?> <b></b> </strong> All rights reserved.
      </footer>

  
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->
 <!-- jquery-ui-timepicker -->
    <script type="text/javascript" src="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery-Timepicker/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery-Timepicker/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery-Timepicker/js/jquery-ui-timepicker-addon-i18n.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery-Timepicker/js/jquery-ui-timepicker-es.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_HTTP; ?>/assets/plugins/jQuery-Timepicker/js/jquery-ui-sliderAccess.js"></script> 
 
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/dist/js/demo.js"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/dist/js/highcharts.js"></script>
    <!-- datatables -->
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js"></script> 
    <script src="<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/extensions/select/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA_HTTP; ?>/assets/plugins/datejs/date.js"></script>
   
       <script>
$('#fecha_gestion').datetimepicker({
  timeFormat: "hh:mm tt",
  dateFormat: 'yy-mm-dd',
  hourMin: 7,
  hourMax: 20
});

$('#date_alarma').datetimepicker({
  timeFormat: "hh:mm tt",
  dateFormat: 'yy-mm-dd',
  minDate: 0,
  hourMin: 7,
  hourMax: 20
});



$('#fecha_pago').datetimepicker({

  timeFormat: "hh:mm tt",
  dateFormat: 'yy-mm-dd',
  maxDate: 0,
  hourMin: 7,
  hourMax: 20
});

$('#date_compromiso').datetimepicker({
  timeFormat: "hh:mm tt",
  dateFormat: 'yy-mm-dd',
  minDate: 0,
  hourMin: 7,
  hourMax: 20
});

$('#txtFechaPromesa').datetimepicker({
  timeFormat: "hh:mm tt",
  dateFormat: 'yy-mm-dd',
  minDate: 0,
  hourMin: 7,
  hourMax: 20
});

$('#txtFechaPago').datetimepicker({
  timeFormat: "hh:mm tt",
  dateFormat: 'yy-mm-dd',
  maxDate: 0,
  hourMin: 7,
  hourMax: 20
});


$(document).ready(function() {
    $('#TablaEntidad').DataTable( {
      "ordering": false,
       "Filter": false,
      "Sortable": true,
       select: true,
      language: {
          url: '<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/json/Spanish.json'
      }
    });

    $('#TablaListaActividad').DataTable( {
      "Filter": false,
      "Sortable": false,
      "ordering": false,
      language: {
          url: '<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/json/Spanish.json'
      }
    });

        

        $('#tblAlarmas').DataTable( {
          "bFilter": false,
          "bSortable": false,
          "ordering": false,
          language: {
          url: '<?php echo RUTA_HTTP; ?>/assets/plugins/datatables/json/Spanish.json'
      }
      } );

        $(function () {
  $('[data-toggle="popover"]').popover()
})

});



    </script>


         
     
  </body>
</html>
