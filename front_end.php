<?php
 include "./admin/connection.php";
  
 $query_s="select count(student_id) from student";
 $result_s=mysqli_query($conn,$query_s);
 $row_s=mysqli_fetch_array($result_s);

 $query2="select count(subject_id) from subject";
 $result2=mysqli_query($conn,$query2);
 $row2=mysqli_fetch_array($result2);

 $query3="select count(teacher_id) from teacher";
 $result3=mysqli_query($conn,$query3);
 $row3=mysqli_fetch_array($result3);

?>
<html>
    <head>
        <title>SCHOOL MANAGEMENT SYSTEM</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--css file-->
<link rel="stylesheet" type="text/css" href="style.css">

<!--goggle font family-->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
        
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<!-----animation link---->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!------------------------------favicon------------->
<link rel='shortcut icon' type='image/x-icon' href='Admin/assets/img/favicon.ico' />
 </head>

  <body>

     <!--Preloader start-->
     <div class="loader-bg">
       <div class="loader">
       </div>
     </div>
      <!--Preloader end-->
        <!--header part start-->
   
        <div class="header" id="topheader">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
                <div class="container text-uppercase p-3" >
                <a class="navbar-brand font-weight-bold text-white" href="#">SMS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto text-uppercase">
                    <li class="nav-item active">
                      <a class="nav-link" href="#topheader">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#Facilities">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#information">About us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#contact">contact us</a>
                      </li>
                  </ul>
                </div>
            </div>
        </nav>
        <section class="header-section">
            <div class="center-div">
                <h1 class="font-weight-bold" data-aos="fade-down">welcome to SMS</h1>
                  <div class="header-button" data-aos="fade-up">
                    <a href="Login Page/Login_page.php" >LOGIN</a>
                 </div>
            </div>
        </section>

    </div>

<!--header part end-->
       
<!--three card start--> 
  <section class="header-extradiv" id="Facilities">
      <div class="container">
        <h1 class=" head text-center font-weight-bold">Our Facilities</h1>
          <div class="row">
              <div class="extra-div col-lg-4 col-md-4 col-12" data-aos="fade-left">
                  <a href=""><i class="fa-3x fa fa-bus" aria-hidden="true"></i></a>
                  <h1>transportation</h1>
                  <p>A school bus transport management system is a tool that helps students, parents, staff, teachers and management at a school efficiently manage transport options to and from the school.</p>
              </div>
              <div class="extra-div col-lg-4 col-md-4 col-12" data-aos="fade-up">
                <a href=""><i class="fa-3x fa fa-chalkboard"></i></a>
                <h1>smart class</h1>
                <p>Smart Class is a study facility with the help of Computer, Through the Video, Image and Animation. 
                   Which describe study content in the smart way and interactive way.</p>
            </div>
            <div class="extra-div col-lg-4 col-md-4 col-12" data-aos="fade-right">
              <a href=""><i class="fa-3x fas fa-book-open"></i></a>
              <h1>Library</h1>
              <p>The library is a comfortable space, it has reading rooms with open access to the fund, including periodicals and areas for group work.
               </p>
          </div>
          </div>
      </div>
  </section>
<!--three card end-->

<!-----------counter  start--------->
<section class="counter">
  <div class="container d-flex justify-content-around align-item-center text-center">
    <div>
       <i class="icons fas fa-people-carry"></i>
        <h2 class="count"><?php echo $row_s[0];?></h2>
        <p>Student</p>  
     </div>
     <div>
      <i class="icons fas fa-chalkboard-teacher"></i>
       <h2 class="count"><?php echo $row3[0];?></h2>
       <p>Teacher</p>  
    </div>
    <div>
      <i class="icons fas fa-book"></i>
      <h2 class="count"><?php echo $row2[0];?></h2>
       <p>Subject</p>  
    </div>
    <div>
      <i class="icons fas fa-user-graduate"></i>
       <h2 class="count">5000</h2>
       <p>Student Complete</p>  
    </div>

  </div>
</section>

<!-------------counter end---------->

<!-------------about us  start---------->
<section class="abouts" id="information">
  <div class="about" data-aos="fade-right">
  <div class="inner-section" data-aos="fade-left"> 
     <h1 data-aos="fade-left">About Us</h1>
     <p class="text-p" data-aos="fade-left">Our school's mission is to learn leadership, the common core, and relationships for life.
         Our mission is to provide a safe, disciplined learning environment that empowers all students to develop their full potential.
         We feel strongly about helping to build leaders that have the ability to succeed in whatever endeavor they undertake. Winning is not always the measure of success.
         Our students understand the "Win, win" philosophy and use it in their daily life. Common standards keeps us focused on learning appropriate content and preparing our students to graduate. 
         Last but just as importantly.</p>
  </div>
  </div>
</section>



<!-------------about us  end---------->

<!-------------team profile  start---------->
<section class="team" id="Developer">
 <div class="container my-3 py-5 text-center">
    <div class="row mb-5">
      <div class="col">
        <h1>Our team</h1>
      </div>
    </div>
 </div>
 <div class="row" data-aos="fade-down">
   <div class="col-lg-3 col-md-6">
     <div class="card">
       <div class="card-body">
         <img src="IMAGE/profile1.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
         <h2>Ghori Neel</h2>
         <h5>Php Developer</h5>
         <div class="d-flex flex-row justify-content-center">
           <div class="p-4">
             <a href="#">
              <i class="fab fa-facebook-square"></i>
             </a>
           </div>
           <div class="p-4">
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
          <div class="p-4">
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
         </div>
       </div>
     </div>

   </div>
   <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <img src="IMAGE/profile2.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
        <h2>Bhimani Keval</h2>
        <h5>Php Developer</h5>
        <div class="d-flex flex-row justify-content-center">
          <div class="p-4">
            <a href="#">
             <i class="fab fa-facebook-square"></i>
            </a>
          </div>
          <div class="p-4">
           <a href="#">
             <i class="fab fa-instagram"></i>
           </a>
         </div>
         <div class="p-4">
           <a href="#">
             <i class="fab fa-twitter"></i>
           </a>
         </div>
        </div>
      </div>
    </div>

  </div>
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <img src="IMAGE/profile3.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
        <h2>Jap Dave</h2>
        <h5>Php Developer</h5>
        <div class="d-flex flex-row justify-content-center">
          <div class="p-4">
            <a href="#">
             <i class="fab fa-facebook-square"></i>
            </a>
          </div>
          <div class="p-4">
           <a href="#">
             <i class="fab fa-instagram"></i>
           </a>
         </div>
         <div class="p-4">
           <a href="#">
             <i class="fab fa-twitter"></i>
           </a>
         </div>
        </div>
      </div>
    </div>

  </div>
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <img src="IMAGE/profile4.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
        <h2>Patel Dhruv</h2>
        <h5>Android Developer</h5>
        <div class="d-flex flex-row justify-content-center">
          <div class="p-4">
            <a href="#">
             <i class="fab fa-facebook-square"></i>
            </a>
          </div>
          <div class="p-4">
           <a href="#">
             <i class="fab fa-instagram"></i>
           </a>
         </div>
         <div class="p-4">
           <a href="#">
             <i class="fab fa-twitter"></i>
           </a>
         </div>
        </div>
      </div>
    </div>

  </div>

 </div> 

</section>

<!-------------team profile  end---------->

<!-------------contact us  start---------->
<section class="phone" id="contact">
  <div class="container">
    <h1 class=" text text-center font-weight-bold">Contact Us</h1>
      <div class="row">
          <div class="extra-div col-lg-4 col-md-4 col-12" data-aos="fade-left">
              <a href="#"><i class="fa-3x fa fa-map-marked-alt" aria-hidden="true"></i></a>
              <h1>Location</h1>
              <p>Katargam</p>
              <p>Surat</p>
          </div>
          <div class="extra-div col-lg-4 col-md-4 col-12" data-aos="fade-up">
            <a href="#"><i class="fa-3x fa fa-phone-alt"></i></a>
            <h1>Phone</h1>
            <p>9812345456</p>
            <p>2345874</p>
        </div>
        <div class="extra-div col-lg-4 col-md-4 col-12" data-aos="fade-right">
          <a href="#"><i class="fa-3x fas fa-envelope"></i></a>
          <h1>Email</h1>
          <p>abcschool@gmail.com</p>
       </div>
    </div>
  </div>
</section>

<!-------------contact us  end---------->

<!-----footer start--------------------->
<footer class="footersection" id="footerfdiv">
  <div class="container">
    <div class="row" data-aos="fade-down">
      <div class="col-lg-4 col-md-6 col-12 footer-div">
        <div>
          <h3>Navigation</h3>
          <li><a href="#">HOME</a></li>
          <li><a href="#">Facilities</a></li>
          <li><a href="#">ABOUT US</a></li>
          <li><a href="#">OUR TEAM</a></li>
          <li><a href="#">CONTACT US</a></li>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 footer-div">
        <div>
          <h3>Contact Us</h3>
            <p>
              24 block D,<br>
              avalon,Surat<br>
              gujarat.<br>
            </p>
              <strong>Phone:+919812345456 <br></strong>
              <strong>Email:Abcschool@Gmail.Com <br></strong> 
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-12 footer-div">
        <div>
          <h3>Follow Us</h3>
          <div class="social">
          <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
          <a href="#" class="google"><i class="fab fa-google-plus"></i></a>
          <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
   </div>
  </div>
  <div class="container">
    <div class="copyright">
      &copy;copyright.All Rights Reserved|Design By Code Devil's
    </div>
  </div>  
</footer>

<!-------footer end--------------------->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!--jquery counter-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>

<!--animation script link-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  $('.count').counterUp({
    delay:10,
    time:2000
    });

   /****preloader start script*****/
     setTimeout(function(){
       $('.loader-bg').fadeToggle();
   },1000);
   /****preloader end script*****/

    /****animation start script*****/
    AOS.init({
     
      duration:2000,
    });
     
    
    /****animation end script*****/
</script>

</body>
</html> 