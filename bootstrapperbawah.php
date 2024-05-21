
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="jquery.js"></script>
  <script>
    $(document).ready(function () {
      $('#cetakTiket').click(function () {
        $.ajax({
          type: 'GET',
          url: '<?php echo $_SERVER['PHP_SELF']; ?>', // Menggunakan PHP_SELF untuk mengambil URL dari halaman saat ini
          data: { action: 'savejson' },
          success: function (response) {
          }
        });
      });
    });
  </script>


