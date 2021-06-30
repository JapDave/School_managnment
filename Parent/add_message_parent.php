<?php
session_start();
include "isauth_parent.php";
?>
<!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../Admin/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../Admin/assets/css/style.css">
  <link rel="stylesheet" href="../Admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../Admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../Admin/assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "sidebar_parent.php";?>
      <?php include "navbar_parent.php"?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
              <form action="../Teacher/insert_message_teacher.php" method="POST">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Message</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Message</label>
                      <textarea class="form-control" name="parent_m" placeholder="Enter Your Message" required></textarea>
                   </div>
                   
                  </div>
                  <div class="card-footer text-right">
                  <input type="submit" name="parent_message" value="submit" class="btn btn-primary mr-1">
                  </div>
                </div>
            </div>
            </form>
          </div>
        </section>
        
    </div>
  </div>
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
  <?php include "footer_parent.php";?>