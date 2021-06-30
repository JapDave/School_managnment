<?php
session_start();
include "isauth.php";
 include "connection.php";
 
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

    <!-------Search input--------->
  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
  
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
          <form action="insert_data.php" method="POST" name="insert_student"  enctype="multipart/form-data">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Student</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" id="first_name" class="form-control" name="s_f_name" required>
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" id="last_name" class="form-control" name="s_l_name" required>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" id="address" name="s_address" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Roll No</label>
                      <input type="text" id="roll_no" class="form-control" name="s_roll" required>
                     </div>
                     <div class="form-group">
                      <label>Email</label>
                      <input type="email" id="email" class="form-control" name="s_email" required>
                     </div>
            
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" id="gender" name="s_gender" required>
                        <option value=""></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>

                   
                    <div class="form-group">
                      <label>BirthDay</label>
                      <input type="date" id="dob" class="form-control" name="s_birth" required>
                    </div>
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" id="age" class="form-control" name="s_age" required>
                    </div>
                    <div class="form-group">
                      <label>Class No</label>
                      <select class="form-control" id="classno" name="s_class" required>
                      <?php
                      
                         $query="select * from class";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                           $class_no=$row['class'];
                      ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $class_no;?></option>
                         <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Parent/Gudiance</label>
                      <select   id="chosen" id="parent" class="form-control" name="s_parent"  required>
                      <option value="">Select Parent</option>
                      <?php
                   
                         $query="select * from parent";
                         $result=mysqli_query($conn,$query);
                         while($row=mysqli_fetch_array($result)){
                           $firstname=$row['p_first_name'];
                           $lastname=$row['p_last_name'];
                      ?>
                     
                        <option value="<?php echo $row['parent_id']; ?>"><?php echo $firstname." ".$lastname;?></option>
                         <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" id="password" class="form-control" name="s_password" required>
                     </div>
                     <div class="form-group">
                      <label>Blood Group</label>
                      <input type="text" id="blood_group" class="form-control" name="s_blood" required>
                     </div>
                     <div class="form-group">
                      <label>Phone</label>
                      <input type="text" id="phone" class="form-control" name="s_phone" required>
                     </div>
                     <div class="form-group">
                      <label>Religion</label>
                      <input type="text" id="religion" class="form-control" name="s_religion" required>
                     </div>
                    <div class="form-group">
                      <label>Profile Photo</label>
                      <input type="file" id="profile_photo" class="form-control" name="s_profile_photo" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary mr-1" value="Submit" id="toastr-2" name="i_student">
                    <input type="reset" class="btn btn-primary" value="Reset">
                    
                  </div>
                </div>
              
    </div>
  </div>
  </form>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" ></script> 

<script type="text/javascript">
   $('#chosen').chosen();
</script>
<?php include "footer_admin.php";?>