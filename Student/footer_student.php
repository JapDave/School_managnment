 <!-- General JS Scripts -->
 <script src="../Admin/assets/js/app.min.js"></script>


  <!-- JS Libraies -->
  <script src="../Admin/assets/bundles/datatables/datatables.min.js"></script>
  <script src="../Admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../Admin/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <script src="../Admin/assets/bundles/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="../Admin/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <script src="../Admin/assets/bundles/summernote/summernote-bs4.js"></script>

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
  <script src="../Admin/assets/js/page/datatables.js"></script>
  <script src="../Admin/assets/js/page/index.js"></script>


  <!-- Template JS File -->
  <script src="../Admin/assets/js/scripts.js"></script>


  <!-- Custom JS File -->
  <script src="../Admin/assets/js/custom.js"></script>
</body>
<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
</html>