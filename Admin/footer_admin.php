
    

  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
   <!-- JS Libraies -->
   <!-- <script src="assets/js/sweetalertnew.js"></script> -->
   <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
   <script src="assets/bundles/summernote/summernote-bs4.js"></script>
   <script src="assets/js/toastr.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
  
?>

<script>
 swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok",
});
</script>
<?php
      unset($_SESSION['status']);
    }
   
   ?>
   
    <!-- Page Specific JS File -->
  <script src="assets/js/page/advance-table.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/page/index.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
   <!-- General JS Scripts -->
  <!---------time picker------------>
  <script src="assets/bundles/cleave-js/dist/cleave.min.js"></script> 
   <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <!-- <script src="assets/js/page/forms-advanced-forms.js"></script> -->

  <!-- Page Specific JS File -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>

 
 
</body>
<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
</html>