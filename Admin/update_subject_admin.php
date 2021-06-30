<?php
session_start();
include "isauth.php";
include "connection.php";
$id=$_GET['id'];
$displayquery="select * from subject where subject_id='$id'";
$result = mysqli_query($conn,$displayquery);
    while ($row=mysqli_fetch_array($result)) {
        $subject=$row['subject_id'];
        $s_name=$row['subject_name'];
        $s_class=$row['class_id'];
        $classquery="select * from class where class_id='$s_class'";
        $classresult=mysqli_query($conn,$classquery);
        while($rows=mysqli_fetch_array($classresult)){
          $c_class=$rows['class'];
        }
    }
?>


<!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "navbar_admin.php";?>
        <?php include "sidebar_admin.php";?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <form action="update_data.php" method="POST">
          <input type="hidden" name="subject_hidden" value="<?php echo $subject; ?>">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Subject</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Subject Name</label>
                      <input type="text" class="form-control" name="e_sub_name" value="<?php echo $s_name;?>" required>
                    </div>
            
                    <div class="form-group">
                      <label>Select Class</label>
                    
                      <select class="form-control" name="e_sub_class" required>
                      <?php
                       include "connection.php";
                         $query="select * from class";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                          $class=$row['class'];
                          $class_id=$row['class_id']
                      ?>
                     
                        <option value="<?php echo $class_id;?>" <?php if($c_class == "$class"){ echo "selected";}?>><?php echo $class ;?></option>
                        <?php }?>
                      </select>
                    
                     
                    </div>

                   
                  
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Update"  name="e_subject">
                    
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>
  <?php include "footer_admin.php";?>