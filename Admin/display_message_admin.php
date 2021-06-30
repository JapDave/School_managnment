<?php
session_start();
error_reporting(0);
include "isauth.php";
 include "connection.php";
 
 ?>
<!DOCTYPE html>
<html lang="en">


<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
 
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  
</head>

<body>
 
 <!-----------------------------new one ----------------------------------->
 <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "navbar_admin.php";?>
        <?php include "sidebar_admin.php";?>
    
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-6 col-md-1 col-lg-1">
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">Show Message</button>
                  </div>
              </div>
            </div>   
            
           <div id="display_record"></div>
          </div>
        </section>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Show Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST">
                <div class="form-group">
                <label style="margin-top:20px;">Select User</label>
                  <select class="form-control" id="show_user"  name="class_marks"  required> 
                
                  <option value="">Select One</option>
                  <option value="student">Student</option>
                  <option value="parent">Parent</option>
                  <option value="teacher">Teacher</option>
                 
              </select>
              </div>
               
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
     $('#show_user').change(function(){
        var showuser=$('#show_user').val();
        $.ajax({
           method:'POST',
           url:'import_message.php',
           data:{shower:showuser},
           success:function(data){
             $('#display_record').html(data);
           }
        });
        $('#exampleModal1').modal('hide');
     });
  });
  </script>
 
  <!-----------------------------new one ----------------------------------->
  <?php include "footer_admin.php";?>