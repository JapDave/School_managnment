<!---------------php display form for update start-------------->

<?php
session_start();
include "isauth.php";
                   include "connection.php";
                   $id=$_GET['id'];
                   $displayquery="select * from parent where parent_id='$id'";
                   $result = mysqli_query($conn,$displayquery);
	                   while ($row=mysqli_fetch_array($result)) {
                      
                      $parent=$row['parent_id'];
                      $firstname=$row['p_first_name'];
                      $lastname=$row['p_last_name'];
                      $address=$row['address_p'];
                      $occupation=$row['occupation'];
                      $email=$row['e_mail_p'];
                      $mobile=$row['phone_p'];
                      $gender=$row['gender_p'];
                      $birthday=$row['dob_p'];
                      $age=$row['age_p'];
                      $bgroup=$row['blood_group_p'];
                      $profile_photo=$row['profiles_photo_p'];
                    
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
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <span style="text-transform:uppercase;"><?php echo $firstname." ".$lastname;?></span>
                      </div>
                <!-- <div class="card"> -->
                  
                  <div class="card-body">
                    <div class="py-4">
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
                          Occupation
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $occupation;?>
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
                          aria-selected="true">Parent Details</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <form method="post" action="update_data.php" class="needs-validation">
                        <input type="hidden" name="parent_hidden" value="<?php echo $parent; ?>">
                          <div class="card-header">
                            <h4>Edit Parent Details</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-3 col-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="e_p_f_name" value="<?php echo $firstname;?>" required>
                                
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="e_p_l_name" value="<?php echo $lastname;?>" required>
                                
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Occupation</label>
                                <input type="text" class="form-control" name="e_p_occupation" value="<?php echo $occupation;?>" required>
                                
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Gender</label>
                                <select class="form-control" name="e_p_gender" required>
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
                                  class="form-control" name="e_p_address" required><?php echo $address;?></textarea>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-7 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="e_p_email" value="<?php echo $email;?>" required>
                                
                              </div>
                              <div class="form-group col-md-5 col-12">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="e_p_phone" value="<?php echo $mobile;?>" required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-4 col-12">
                                <label>Age</label>
                                <input type="text" class="form-control" name="e_p_age" value="<?php echo $age;?>" required>
                                
                              </div>
                              <div class="form-group col-md-4 col-12">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="e_p_birthday" value="<?php echo $birthday;?>" required>
                              </div>
                              <div class="form-group col-md-4 col-12">
                                <label>Blood Group</label>
                                <input type="text" class="form-control" name="e_p_blood_group" value="<?php echo $bgroup;?>" required>
                              </div>
                
                            </div>
                           
                            
                           
                          <div class="card-footer text-right">
                            <button class="btn btn-primary" name="e_parent">Update</button>
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
  <?php include "footer_admin.php"; ?>