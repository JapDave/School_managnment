<?php
session_start();
include "isauth.php";
include "connection.php";
$id=$_GET['id'];
$c_t_q="select * from class_teacher where class_teacher_id='$id'";
$c_t_r=mysqli_query($conn,$c_t_q);
while($row8=mysqli_fetch_array($c_t_r)){
     $classidsss=$row8['class_teacher_id'];
     $class_number=$row8['class_id'];
     $teacher_id=$row8['teacher_id'];
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
          <form action="update_data.php" method="POST" name="edit_class_teacher">
          <input type="hidden" name="class_teacher_hidden" value="<?php echo $classidsss; ?>">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Class Teacher</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Teacher Name</label>
                      <select class="form-control"  style="text-transform:uppercase;" name="c_t_name" required>
                      <option value="#">Select Teacher</option>
                      <?php
                      include "connection.php";
                         $query="select * from teacher";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                           $t_ids=$row['teacher_id'];
                           $t_f_name=$row['t_f_name'];
                           $t_l_name=$row['t_l_name']; 
                          
                      ?>
                       
                     <option  value="<?php echo $t_ids; ?>" <?php if($t_ids == "$teacher_id"){ echo "selected";}?>><?php echo $t_f_name." ".$t_l_name;?></option>
                        <?php }  ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Class</label>
                      <select class="form-control"  style="text-transform:uppercase;" name="c_t_class" required>
                      <?php
                      include "connection.php";
                         $query1="select * from class";
                         $result1=mysqli_query($conn,$query1);
                         while($row1=mysqli_fetch_array($result1)){
                            $class_id=$row1['class_id'];
                             $c_name=$row1['class'];
                          
                      ?>
                          <option  value="<?php echo $class_id; ?>" <?php if($class_id == "$class_number"){ echo "selected";}?>><?php echo $c_name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit"  name="u_class_teacher">
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>
 <?php include "footer_admin.php";?>