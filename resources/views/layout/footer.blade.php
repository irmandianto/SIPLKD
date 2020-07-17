    <footer class="main-footer">
      <strong>Copyright &copy; 2020 Qatulistiwa Islam rights reserved</strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="/../admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="/../admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Morris.js charts -->
  <script src="/../admin/bower_components/raphael/raphael.min.js"></script>
  <script src="/../admin/bower_components/morris.js/morris.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="/../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Sparkline -->
  <script src="/../admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="/../admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/../admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="/../admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="/../admin/bower_components/moment/min/moment.min.js"></script>
  <script src="/../admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="/../admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="/../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="/../admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/../admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/../admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/../admin/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/../admin/dist/js/demo.js"></script>

<script type="text/javascript">
var array = @json($datagrafik);
  
  new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each  ntry in this array corresponds to a point on
  // the chart.

 data: @json($datagrafik),

  // The name of the data record attribute that contains x-"value"s.
  xkey: "tgl_evaluasi",
  // A list of names of data record attributes that contain y-"value"s.
  ykeys: ["shalat_berjamaah","shalat_dhuha","tilawah_quran","qiyamul_lail"],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ["Shalat Berjamaah", "Shalat Dhuha","Tilawah Qur'an","Qiyamul Lail"]
});
</script>

</body>
</html>
