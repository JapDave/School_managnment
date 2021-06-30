<!---------------php display form for update start-------------->

<?php
session_start();
error_reporting(0);
include "isauth.php";
                   include "connection.php";
                   $id=$_GET['id'];
                   $displayquery="select * from student where student_id='$id'";
                   $result = mysqli_query($conn,$displayquery);
	                   while ($row=mysqli_fetch_array($result)) {
                      
                      $student=$row['student_id'];
                      $firstname=$row['first_name'];
                      $lastname=$row['last_name'];
                      $address=$row['address_s'];
                      $roll=$row['roll_no'];
                      $class_id=$row['class_id'];
                      $q_c="select * from class where class_id='$class_id'";
                      $r_c=mysqli_query($conn,$q_c);
                      while($rows=mysqli_fetch_array($r_c)){
                        $class_nos=$rows['class'];
                      }
                      $email=$row['e_mail_s'];
                      $mobile=$row['phone_s'];
                      $gender=$row['gender_s'];
                      $religion=$row['religion_s'];
                      $birthday=$row['dob_s'];
                      $age=$row['age_s'];
                      $bgroup=$row['blood_group_s'];
                      $profile_photo=$row['profile_photo_s'];
                    
                     }
                ?>

               <!---------------php display form for update end-------------->

<!DOCTYPE html>
<html lang="en">


<!-- profile.html  21 Nov 2019 03:49:30 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
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
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                     <img alt="image" src="<?php echo $profile_photo?>" class="rounded-circle author-box-picture">
                     <div class="clearfix"> 
                      </div>
                      <div class="author-box-name">
                        <span style="text-transform:uppercase;"><?php echo $firstname." ".$lastname;?></span>
                      </div>
                <!-- <div class="card"> -->
                  
                  <div class="card-body">
                    <div class="py-4">
                    <p class="clearfix">
                        <span class="float-left">
                          Class
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $class_nos;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $birthday;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                        <?php echo $mobile;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                        <?php echo $email;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Roll No
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $roll;?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Blood Group
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $bgroup;?>
                        </span>
                      </p>
                    <!-- </div> -->
                  </div>
                </div>
                    </div>
                  </div>
                </div>
               
              </div>
              
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Student Details</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <form method="post" action="update_data.php" class="needs-validation">
                        <input type="hidden" name="student_hidden" value="<?php echo $student; ?>">
                          <div class="card-header">
                            <h4>Edit Student Details</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-3 col-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="e_f_name" value="<?php echo $firstname;?>" required>
                                
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="e_l_name" value="<?php echo $lastname;?>" required>
                                
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Roll No</label>
                                <input type="text" class="form-control" name="e_roll" value="<?php echo $roll;?>" required>
                                
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Gender</label>
                                <select class="form-control" name="e_gender" required>
                                  <option></option>
                                  <option value="male" <?php if($gender == "male"){ echo "selected";}?>>Male</option>
                                  <option value="female" <?php if($gender == "female"){ echo "selected";}?>>Female</option>
                                </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Address</label>
                                <textarea
                                  class="form-control" name="e_address" required><?php echo $address;?></textarea>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-7 col-12">
                                <label>Parent Name</label>
                                <input type="text" class="form-control" name="e_email" value="<?php echo $parent;?>" disabled>
                                
                              </div>
                          
                            <div class="form-group col-md-5 col-12">
                               <label>Class No</label>
                               <select class="form-control" name="s_class" required>
                               <?php
                               include "connection.php";
                                 $query="select * from class";
                                  $result=mysqli_query($conn,$query);
                                  while($row=mysqli_fetch_array($result)){
                                    $class_no=$row['class'];
                                    $class_id=$row['class_id']
                               ?>
                                 <option value="<?php echo $class_id ; ?>" <?php if($class_no == "$class_nos"){ echo "selected";}?>><?php echo $class_no;?></option>
                                  <?php } ?>
                               </select>
                             </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-7 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="e_email" value="<?php echo $email;?>" required>
                                
                              </div>
                              <div class="form-group col-md-5 col-12">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="e_phone" value="<?php echo $mobile;?>" required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-2 col-12">
                                <label>Age</label>
                                <input type="text" class="form-control" name="e_age" value="<?php echo $age;?>" required>
                                
                              </div>
                              <div class="form-group col-md-4 col-12">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="e_birthday" value="<?php echo $birthday;?>" required>
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Blood Group</label>
                                <input type="text" class="form-control" name="e_blood_group" value="<?php echo $bgroup;?>" required>
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Religion</label>
                                <input type="text" class="form-control" name="e_religion" value="<?php echo $religion;?>" required>
                              </div>
                            </div>
                           
                            
                           
                          <div class="card-footer text-right">
                            <button class="btn btn-primary" name="e_student">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       
    </div>
  </div>
 <?php include "footer_admin.php";?>