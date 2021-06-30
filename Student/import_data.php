<?php
session_start();
include "../Admin/connection.php";


if(isset($_POST['txt5'])){


    $teacher_id=$_POST['txt5'];
    $query="select t1.*,t2.*,t3.* from teacher as t1 left join subject as t2 on
            t1.subject_id=t2.subject_id LEFT join class as t3 on 
            t2.class_id=t3.class_id where t1.teacher_id='$teacher_id'";
    $results=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($results)){
        $tname=$row['t_f_name']." ".$row['t_l_name'];
        $address=$row['address_t'];
        $phone=$row['phone_t'];
        $email=$row['e_mail_t'];
        $gender=$row['gender_t'];
        $quali=$row['qualification_t'];
        $exp=$row['experience_t'];
        $dob=$row['dob_t'];
        $age=$row['age_t'];
        $religion=$row['religion_t'];
         $profile=$row['profile_photo_t'];
        
    }
    
    
    
    $data='<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-4">
      <div class="card author-box">
        <div class="card-body">
          <div class="author-box-center">
            <img alt="image" src="../Admin/'. $profile.'" class="rounded-circle author-box-picture">
            <div class="clearfix"></div>
            <div class="author-box-name">
              <a href="#">'.$tname.'</a>
            </div>
         
          </div>
          
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>Personal Details</h4>
        </div>
        <div class="card-body">
          <div class="py-4">
            <p class="clearfix">
              <span class="float-left">
                Birthday
              </span>
              <span class="float-right text-muted">
              '.$dob.'
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                Phone
              </span>
              <span class="float-right text-muted">
              '.$phone.'
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                Mail
              </span>
              <span class="float-right text-muted">
               '.$email.'
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                Religion
              </span>
              <span class="float-right text-muted">
                <a href="#">'.$religion.'</a>
              </span>
            </p>
            <p class="clearfix">
              <span class="float-left">
                Age
              </span>
              <span class="float-right text-muted">
                <a href="#">'.$age.'</a>
              </span>
            </p>
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
                aria-selected="true">About</a>
            </li>
            
          </ul>
          <div class="tab-content tab-bordered" id="myTab3Content">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
              <div class="row">
                <div class="col-md-3 col-6 b-r">
                  <strong>Full Name</strong>
                  <br>
                  <p class="text-muted">'.$tname.'</p>
                </div>
                <div class="col-md-3 col-6 b-r">
                  <strong>Mobile</strong>
                  <br>
                  <p class="text-muted">'.$phone.'</p>
                </div>
                <div class="col-md-3 col-6 b-r">
                  <strong>Email</strong>
                  <br>
                  <p class="text-muted">'.$email.'</p>
                </div>
                <div class="col-md-3 col-6">
                  <strong>Gender</strong>
                  <br>
                  <p class="text-muted">'.$gender.'</p>
                </div>
              </div>
             
              <div class="section-title">Address</div>
              <ul>
                <li>'.$address.'</li>
              </ul>
            
           
          
          <div class="section-title">Qualification</div>
          <ul>
            <li>'.$quali.'</li>
          </ul>
          <div class="section-title">Experience</div>
          <ul>
            <li>'.$exp.'</li>
          </ul>
        
       
      </div>
        </div>
      </div>
    </div>
    </div>';
    
    echo $data;
    
    }

/******************************************************exam result show for student**************************************************/

if(isset($_POST['exam'])){
  $examid=$_POST['exam'];
  $equery="select * from exam_student where exam_id='$examid'";
  $eresult=mysqli_query($conn,$equery);
  $erow=mysqli_fetch_array($eresult);
  $exmnames=$erow['exam_name'];
  $years=$erow['exam_year'];
  $query="select t1.*,t2.* from student as t1 left join class as t2 on t1.class_id=t2.class_id where t1.student_id=".$_SESSION['student'];
  $result=mysqli_query($conn,$query);
   $row=mysqli_fetch_array($result);
   $student_roll=$row['roll_no'];
   $student_class=$row['class'];
  $data=' <div class="col-12 col-md-12 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4>Student Result</h4>
    </div>
    <h6 style="padding-left:25px;color:black;">Student Name: '.$row['first_name']." ".$row['last_name'].'</h6>
    <h6 style="padding-left:25px;color:black;">Roll No: '.$student_roll.'</h6>
    <h6 style="padding-left:25px;color:black;">Class: '.$student_class.'</h6>
    <h6 style="padding-left:25px;color:black;">Exam Name: '.$exmnames."-".$erow['exam_year'].'</h6>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-md">
          <tr>
         
            <th>Mathematics</th>
            <th>English</th>
            <th>Social Science</th>
            <th>Science</th>
            <th>Hindi</th>
            <th>Total</th>
            <th>Percentage</th>
          
          </tr>
          <tr>';
          
        
           $query1= "select * from result where rollno='$student_roll' and class='$student_class' and ExamName='$exmnames' and Year='$years'";
           $result1=mysqli_query($conn,$query1);
           
           if(mysqli_num_rows($result1) <=0){
              $data .='<tr>
              <td colspan="2" style="padding-left:50px;color:red;font-size:20px;">Result Is Not Declared</td>
              </tr>';
           }else{

           
           while($rows=mysqli_fetch_array($result1)){
               $percenatage=$rows['Percentage'];
          
           $data .= '<td>'.$rows['Mathematics'].'</td>
            <td>'.$rows['English'].'</td>
            <td>'.$rows['SocialScience'].'</td>
            <td>'.$rows['Science'].'</td>
            <td>'.$rows['Hindi'].'</td>
            <td>'.$rows['Total'].'</td>
            <td>'.$rows['Percentage'].'</td>';


          }
          if($percenatage <= 35){
            $data.='<h2 style="color:red;font-size:30px;">Sorry! You have not cleared this exam.</h2>';
        }else{
         $data .='<h2 style="color:green;font-size:30px;">Congratulation!! You have passed this exam.</h2>';
        }
        
           } 
   $data .='</tr>
          </table>
      </div>
    </div>
  </div>
</div>';

echo $data;
}

?>