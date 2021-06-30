<?php
error_reporting(0);
include "connection.php";
$adminquery="select * from admin_login where admin_id=".$_SESSION['admin'];
$adminresult=mysqli_query($conn,$adminquery);
$admin=mysqli_fetch_array($adminresult);


?>
<html>
    <body>
<nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" id="notification" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              
              <span class="badge headerBadge1" id="notification_count">
               </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown" id="notification_message">
              <div class="dropdown-header">
                Messages
              </div>
              <div class="dropdown-list-content dropdown-list-message">
            
                <a href="#" class="dropdown-item"> 
                  
                <span class="dropdown-item-avatar text-white"> 
                <img alt="image" src="" class="rounded-circle">
                </span>
                <span class="dropdown-item-desc"> 
                <span class="message-user"></span>
                <span class="time messege-text"></span>
                <!-- <span class="time"></span> -->
                   
                </span>
                  
                </a> 
                   
              
              <div class="dropdown-footer text-center">
                <a href="display_message_admin.php">View All <i class="fas fa-chevron-right"></i></a>
              </div>
                 
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
             
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                      <span class="dropdown-item-icon bg-primary text-white"> 
                        <i class="fas fa-code"></i>
                      </span> 
                    <span class="dropdown-item-desc"> Template update is available now! <span class="time">2 Min Ago</span> 
                   </span>
                </a>  
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/profile1.jpg"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $admin['username'];?></div>
              <a href="admin_profile.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
               </a> 
              <div class="dropdown-divider"></div>
              <a href="logout_admin.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script>
        $(document).ready(function(){
          $('#notification').click(function(){
             jQuery.ajax({
               url:'update_message.php',
               success:function(){
                $('#notification_message').fadeToggle('fast','linear');
               $('#notification_count').fadeOut('slow');
               }
             })
            
            return false;
          });
          $(document).click(function(){
            $('#notification_message').hide();
          });
        });
      </script>
   </body>
</html>