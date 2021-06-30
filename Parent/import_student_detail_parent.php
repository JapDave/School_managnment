<?php
session_start();
include "../Admin/connection.php";
if(isset($_POST['text2'])){


$student_id=$_POST['text2'];
 $student_query="select t1.*,t2.* from student as t1 left join class as t2 on
        t1.class_id=t2.class_id  where t1.student_id='$student_id'";
$student_results=mysqli_query($conn,$student_query);
$row=mysqli_fetch_array($student_results);

$data ='<div class="row mt-sm-4">
<div class="col-12 col-md-12 col-lg-4">
  <div class="card author-box">
    <div class="card-body">
      <div class="author-box-center">
        <img alt="image" src="../Admin/'.$row['profile_photo_s'].'" class="rounded-circle author-box-picture">
        <div class="clearfix">
        <div class="author-box-name">
        <a href="#"></a>
      </div>
        </div>
        <div class="author-box-name">
          <a href="#">'.$row['first_name']." ".$row['last_name'].'</a>
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
        Class
      </span>
      <span class="float-right text-muted">
      '.$row['class'].'
      </span>
    </p>
    <p class="clearfix">
    <span class="float-left">
      Religion
    </span>
    <span class="float-right text-muted">
    '.$row['religion_s'].'
    </span>
  </p>
        <p class="clearfix">
          <span class="float-left">
            Birthday
          </span>
          <span class="float-right text-muted">
          '.$row['dob_s'].'
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Phone
          </span>
          <span class="float-right text-muted">
          '.$row['phone_s'].'
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Mail
          </span>
          <span class="float-right text-muted">
           '.$row['e_mail_s'].'
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Blood Group
          </span>
          <span class="float-right text-muted">
            <a href="#">'.$row['blood_group_s'].'</a>
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Age
          </span>
          <span class="float-right text-muted">
            <a href="#">'.$row['age_s'].'</a>
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
              <p class="text-muted">'.$row['first_name']." ".$row['last_name'].'</p>
            </div>
            <div class="col-md-3 col-6 b-r">
              <strong>Mobile</strong>
              <br>
              <p class="text-muted">'.$row['phone_s'].'</p>
            </div>
            <div class="col-md-3 col-6 b-r">
              <strong>Email</strong>
              <br>
              <p class="text-muted">'.$row['e_mail_s'].'</p>
            </div>
            <div class="col-md-3 col-6">
              <strong>Gender</strong>
              <br>
              <p class="text-muted">'.$row['gender_s'].'</p>
            </div>
          </div>
         
          <div class="section-title">Address</div>
          <ul>
            <li>'.$row['address_s'].'</li>
          </ul>
          
      </div>
    </div>
  </div>
</div>
</div>';

echo $data;
}


if(isset($_POST['txt3'])){
 
  $parent_id=$_POST['txt3'];
 $parent_query="select t1.*,t2.*,t3.* from teacher as t1 left join subject as t2 on
 t1.subject_id=t2.subject_id left join class as t3 on
 t2.class_id=t3.class_id where t1.teacher_id='$parent_id'";
$parent_results=mysqli_query($conn,$parent_query);
$row=mysqli_fetch_array($parent_results);

$data ='<div class="row mt-sm-4">
<div class="col-12 col-md-12 col-lg-4">
  <div class="card author-box">
    <div class="card-body">
      <div class="author-box-center">
        <img alt="image" src="../Admin/'.$row['profile_photo_t'].'" class="rounded-circle author-box-picture">
        <div class="clearfix">
        <div class="author-box-name">
        <a href="#"></a>
      </div>
        </div>
        <div class="author-box-name">
          <a href="#">'.$row['t_f_name']." ".$row['t_l_name'].'</a>
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
        Class
      </span>
      <span class="float-right text-muted">
      '.$row['class'].'
      </span>
    </p>
    <p class="clearfix">
    <span class="float-left">
      Subject Teaching
    </span>
    <span class="float-right text-muted">
    '.$row['subject_name'].'
    </span>
  </p>
        <p class="clearfix">
          <span class="float-left">
            Birthday
          </span>
          <span class="float-right text-muted">
          '.$row['dob_t'].'
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Phone
          </span>
          <span class="float-right text-muted">
          '.$row['phone_t'].'
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Mail
          </span>
          <span class="float-right text-muted">
           '.$row['e_mail_t'].'
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Religion
          </span>
          <span class="float-right text-muted">
            <a href="#">'.$row['religion_t'].'</a>
          </span>
        </p>
        <p class="clearfix">
          <span class="float-left">
            Age
          </span>
          <span class="float-right text-muted">
            <a href="#">'.$row['age_t'].'</a>
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
              <p class="text-muted">'.$row['t_f_name']." ".$row['t_l_name'].'</p>
            </div>
            <div class="col-md-3 col-6 b-r">
              <strong>Mobile</strong>
              <br>
              <p class="text-muted">'.$row['phone_t'].'</p>
            </div>
            <div class="col-md-3 col-6 b-r">
              <strong>Email</strong>
              <br>
              <p class="text-muted">'.$row['e_mail_t'].'</p>
            </div>
            <div class="col-md-3 col-6">
              <strong>Gender</strong>
              <br>
              <p class="text-muted">'.$row['gender_t'].'</p>
            </div>
          </div>
         
          <div class="section-title">Address</div>
          <ul>
            <li>'.$row['address_t'].'</li>
          </ul>
          
      </div>
    </div>
  </div>
</div>
</div>';

echo $data;
}

/****************************************************display time table for parent***********************************************/
if(isset($_POST['txt2'])){
   $s_id=$_POST['txt2'];
    $query="select t1.*,t2.* from student as t1 left join class as t2 on
   t1.class_id=t2.class_id where t1.student_id='$s_id'";
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_array($result);
   $classname=$row['class'];
  $data='  <div class="col-12 col-md-12 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4>Time Table</h4>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
          <th>Time</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thrusday</th>
          <th>Friday</th>
          <th>Saturday</th>
          </tr>
        </thead>
        <tbody>';
            
             $query1="select * from timetable8 where class='$classname'"; 
             $result1=mysqli_query($conn,$query1);
             if(mysqli_num_rows($result1) <= 0){

              $data .='<tr>           
              <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center">'. "record not found".'</td>
              
                             </tr>';
             }
             else{
              
             while($rows=mysqli_fetch_array($result1)){
              

              $data.='<tr>
         
              <td>'.$rows['Time'].'</td>       
              <td>'.$rows['Monday'].'</td>
              <td>'.$rows['Tuesday'].'</td>
              <td>'.$rows['Wednesday'].'</td>
              <td>'.$rows['Thrusday'].'</td>
              <td>'.$rows['Friday'].'</td>
              <td>'.$rows['Saturday'].'</td>
          </tr>';
             }
             }
            
           
          
    
        $data.='</tbody>
      </table>
    </div>
  </div>
</div>';
echo $data;
 }

 /************************************************show student result for parents**********************************************/

 if(isset($_POST['exams'] , $_POST['student'])){
  $examid=$_POST['exams'];
  $studentid=$_POST['student'];
  $equery="select * from exam_student where exam_id='$examid'";
  $eresult=mysqli_query($conn,$equery);
  $erow=mysqli_fetch_array($eresult);
  $exmnames=$erow['exam_name'];
  $years=$erow['exam_year'];
  $query="select t1.*,t2.* from student as t1 left join class as t2 on t1.class_id=t2.class_id where t1.student_id='$studentid'";
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
           
           if(mysqli_num_rows($result1) <= 0){
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
            $data.='<h2 style="color:red;font-size:30px;">Sorry! Your Son Has not cleared this exam.</h2>';
        }else{
         $data .='<h2 style="color:green;font-size:30px;">Congratulation!! Your Son Has passed this exam.</h2>';
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
/*******************************************import student teacher name from selection******************************************/
if(isset($_POST['stext3'])){
$s_id=$_POST['stext3'];

  $query="select t1.*,t2.*,t3.*,t4.* from student as t1 left join class as t2 on
  t1.class_id=t2.class_id left join subject as t3 on
  t2.class_id=t3.class_id left join teacher as t4 on t4.subject_id=t3.subject_id where t3.subject_id=t4.subject_id and student_id='$s_id'";
  $result=mysqli_query($conn,$query);
  $data='<option value="">Select One</option>';
 while($rows=mysqli_fetch_array($result)){
   
 
  $data.='
    <option value="'.$rows['teacher_id'].'">'.$rows['t_f_name']." ".$rows['t_l_name'].'</option>
  ';
 }
  echo $data;
}
 
/**************************************display student attendance to parent panel******************************************/
if(isset($_POST['text10'],$_POST['text11'],$_POST['text12'])){

  $studentid=$_POST['text10'];
  $fromdate=$_POST['text11'];
  $todate=$_POST['text12'];

  $fromconvert=date("d M Y",strtotime($fromdate));
   $toconvert=date("d M Y",strtotime($todate));
  $parent="SELECT * FROM student where student_id = '$studentid'";
  $result_parent=mysqli_query($conn,$parent);
  $parent_s=mysqli_fetch_array($result_parent);

  $data=' <div class="col-12 col-md-12 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4>Student Result</h4>
    </div>
    <h6 style="padding-left:25px;color:black;">Student Name: '.$parent_s['first_name']." ".$parent_s['last_name'].'</h6>
    <h6 style="padding-left:25px;color:black;">Date: '.$fromconvert." - ".$toconvert.'</h6>
   
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-md">
          <tr>
         
            <th>Sr no</th>
            <th>Date</th>
            <th>Attendance Status</th>
            
          
          </tr>
          <tr>';
          
        
          $query_attendance="select * from student_attendance where student_id='$studentid' and s_a_date >= '$fromdate' and s_a_date <= '$todate'";
          $result_attendance=mysqli_query($conn,$query_attendance);
           $cont=1;
           if(mysqli_num_rows($result_attendance) <= 0){
              $data .='<tr>
              <td colspan="2" style="padding-left:50px;color:red;font-size:20px;">No Record Found</td>
              </tr>';
           }else{

           
           while($rows=mysqli_fetch_array($result_attendance)){
            
           $data .= '<tr>
           <td>'.$cont.'</td>
            <td>'.date("d-m-Y",strtotime($rows['s_a_date'])).'</td>';

            if($rows['attendance_status'] == "present"){
              $data .='<td><div class="badge badge-success" style="text-transform:capitalize;">'. $rows['attendance_status'].'</div></td>';
             }elseif($rows['attendance_status'] == "absent"){
              $data .='<td><div class="badge badge-danger" style="text-transform:capitalize;">'. $rows['attendance_status'].'</div></td>';
             }
            
             $cont++;   } 
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