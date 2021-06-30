<?php
session_start();
error_reporting(0);
include "../Admin/connection.php";


/********************************Import data of student for parent details display****************************************************/
if(isset($_POST['data'])){
 
  $c_id=$_POST['data'];
$query="select * from student where class_id='$c_id'";
$result=mysqli_query($conn,$query);?>
<option value="">Select One</option>
<?php
while($row=mysqli_fetch_array($result))
{
    ?>
     
    <option value="<?php echo $row['student_id'];?>"><?php echo $row['first_name']." ".$row['last_name'];?></option>
    <?php

}
}

/********************************Import data of student for teacher to  display details****************************************************/

if(isset($_POST['text1'])){
  
   

  $data ='<div class="row">
 <div class="col-12">
   <div class="card">
     <div class="card-header">
       <h4>Display Student</h4>
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
           <thead>
             <tr>
             <th>Profile Picture</th>
             <th>Roll No</th>
             <th>Name</th>
             <th>Action</th>
             </tr>
           </thead>
           <tbody>';
           
                 
                $id=$_POST['text1'];
                  $displayquery="select * from student where class_id='$id'";
                 $result = mysqli_query($conn,$displayquery);
                 if(mysqli_num_rows($result) <= 0){
                   
                   $data .=  '<tr>           
             <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center">'. "record not found".'</td>
             
                            </tr>';
                 }else{
                 
                    while ($row=mysqli_fetch_array($result)) {
           $data .=  '<tr>    
           <td style="padding:20px"><img alt="image" src="../Admin/'. $row['profile_photo_s'].'" class="rounded-circle author-box-picture" style="width:60px;height:60px"></td>       
             <td>'. $row['roll_no'].'</td>
             <td>'. $row['first_name']." ".$row['last_name'].'</td>
             <td><a href="display_student_profile_teacher.php?id='.$row['student_id'].'"><i class="fas fa-edit"></i></a></td>
                            </tr>';
                    }
                   }
 $data .='</tbody>
         </table>
       </div>
     </div>
   </div>
 </div>
</div>';
echo $data;

}


/********************************Import data of parent for teacher to  display details****************************************************/


if(isset($_POST['classids'] , $_POST['studentids'])){


  $class_id=$_POST['classids'];
  $student_id=$_POST['studentids'];
  $query="select t1.*,t2.*,t3.* from student as t1 left join class as t2 on
          t1.class_id=t2.class_id LEFT join parent as t3 on 
          t1.parent_id=t3.parent_id where t1.class_id='$class_id' and t1.student_id='$student_id'";
  $results=mysqli_query($conn,$query);
  while($row=mysqli_fetch_array($results)){
      $pname=$row['p_first_name']." ".$row['p_last_name'];
      $address=$row['address_p'];
      $phone=$row['phone_p'];
      $email=$row['e_mail_p'];
      $gender=$row['gender_p'];
      $occupation=$row['occupation'];
      $dob=$row['dob_p'];
      $age=$row['age_p'];
      $b_group=$row['blood_group_p'];
       $profile=$row['profiles_photo_p'];
      
  }
  
  
  
  $data='<div class="row mt-sm-4">
  <div class="col-12 col-md-12 col-lg-4">
    <div class="card author-box">
      <div class="card-body">
        <div class="author-box-center">
          <img alt="image" src="../Admin/'. $profile.'" class="rounded-circle author-box-picture">
          <div class="clearfix"></div>
          <div class="author-box-name">
            <a href="#">'.$pname.'</a>
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
              Blood Group
            </span>
            <span class="float-right text-muted">
              <a href="#">'.$b_group.'</a>
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
                <p class="text-muted">'.$pname.'</p>
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
          
         
        </div>
      </div>
    </div>
  </div>
  </div>';
  
  echo $data;
  
  }

  /*******************************student result show*********************************************/
  if(isset($_POST['text6'], $_POST['text7'])){
    $id=$_POST['text6'];
     $e_id=$_POST['text7'];
    $queryclass="select * from class where class_id='$id'";
    $resultclass=mysqli_query($conn,$queryclass);
    $rowclass=mysqli_fetch_array($resultclass);
    $classname=$rowclass['class'];
     $queryexam="select * from exam_student where exam_id='$e_id'";
    $resultexam=mysqli_query($conn,$queryexam);
    $rowexam=mysqli_fetch_array($resultexam);
     $examname=$rowexam['exam_name'];
    $years=$rowexam['exam_year'];
    $data ='<div class="row">
   <div class="col-12">
     <div class="card">
       <div class="card-header">
         <h4>Display Student Result</h4>
       </div>
       <h6 style="padding-left:24px;color:black;">Class : '.$classname.'</h6>
       <h6 style="padding-left:24px;color:black;">Exam Name : '.$examname."-".$rowexam['exam_year'].'</h6>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
             <thead>
               <tr>
               <th>Student Name</th>
               <th>Mathematics</th>
               <th>English</th>
              
               <th>Social Science</th>
               <th>Science</th>
               <th>Hindi</th>
             
               <th>Total</th>
               <th>Percentage</th>
               </tr>
             </thead>
             <tbody>';
             
                   
                  
                      $displayquery="select * from result where class='$classname' and ExamName='$examname' and Year = '$years'";
                   $result = mysqli_query($conn,$displayquery);
                   if(mysqli_num_rows($result) <= 0){
                     
                     $data .=  '<tr>           
               <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center;color:red;">'. "Result Is Not Declared".'</td>
               
                              </tr>';
                   }else{
                   
                      while ($row=mysqli_fetch_array($result)) {
             $data .=  '<tr>    
             <td>'.$row['StudentName'].'</td>       
               <td>'. $row['Mathematics'].'</td>
               <td>'. $row['English'].'</td>
              
               <td>'. $row['SocialScience'].'</td>
               <td>'. $row['Science'].'</td>
               <td>'. $row['Hindi'].'</td>
                        
               <td>'. $row['Total'].'</td>
               <td>'. $row['Percentage'].'</td>
                              </tr>';
                      }
                     }
   $data .='</tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
  </div>';
  echo $data;
  
  }



/*******************************************show student attendance to teacher**********************************************/

if(isset($_POST['attdates'])){
    
  $dates_id=$_POST['attdates'];
  
  $querys="select t1.*,t2.*,t3.* from teacher as t1 
  right join class_teacher as t2 on t1.teacher_id=t2.teacher_id left join class as t3 on t2.class_id=t3.class_id where t1.teacher_id=".$_SESSION['teachers'];
   $results=mysqli_query($conn,$querys);
   $rowss=mysqli_fetch_array($results);
   $class_id=$rowss['class_id'];

        $data ='<div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h4>Display Student</h4>
            
           </div>
           <h6 style="padding-left:25px;color:black;">Class: '.$rowss['class'].'</h6>
           <h6 style="padding-left:25px;color:black;">Date: '.$dates_id.'</h6>
           <div class="card-body">
             <div class="table-responsive">
               <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                 <thead>
                   <tr>
                   <th>Sr No</th>
                   <th>Profile Photo</th>
                   <th>Student Name</th>
                   <th>Attendance Status</th>
                   </tr>
                 </thead>
                 <tbody>';
                 
                       
                        $teacher="select t1.*,t2.* from student_attendance as t1 
                                  left join student as t2 on t1.student_id=t2.student_id where t2.class_id='$class_id' and t1.s_a_date='$dates_id'";
                        $result=mysqli_query($conn,$teacher);
                      
                       if(mysqli_num_rows($result) <= 0){
                         
                         $data .=  '<tr>           
                   <td colspan="2" style="text-transform:uppercase;text-weight:400;text-align:center">'. "record not found".'</td>
                   
                                  </tr>';
                       }else{
                       
                          while ($row=mysqli_fetch_array($result)) {
                 $data .=  '<tr>    
                 <td>'.$row['roll_no'].'</td>      
                 <td><img src="../Admin/'.$row['profile_photo_s'].'" style="width:70px;height:70px;border-radius: 50px;margin-top: 10px;"></td> 
                   <td>'. $row['first_name']." ".$row['last_name'].'</td>';
                   if($row['attendance_status'] == "present"){
                    $data .='<td><div class="badge badge-success" style="text-transform:capitalize;">'. $row['attendance_status'].'</div></td>';
                   }elseif($row['attendance_status'] == "absent"){
                    $data .='<td><div class="badge badge-danger" style="text-transform:capitalize;">'. $row['attendance_status'].'</div></td>';
                   }
                   
                 
                               $data .='</tr>';
                       $cont++;   }
                         }
       $data .='</tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
      </div>';
      echo $data;
      
      
}
/*******************************request accpect or denied for student attendance teacher********************************************/

if(isset($_POST['ryes'])){

  $ryes=$_POST['ryes'];
  $sid=$_POST['sid'];

  $query="update student_attendance set requested='$ryes',status='0' where student_id='$sid'";
  $result=mysqli_query($conn,$query);
  if($result){
    $_SESSION['status']="Accepted";
    $_SESSION['status_code']="success";
  }else{
    $_SESSION['status']="Error";
    $_SESSION['status_code']="error";
  }

}elseif(isset($_POST['rno'])){
  $rno=$_POST['rno'];
  $sid=$_POST['sid'];

  $query="update student_attendance set requested='$rno',status='0' where student_id='$sid'";
  $result=mysqli_query($conn,$query);
  if($result){
    $_SESSION['statuss']="Rejected";
    $_SESSION['status_codes']="success";
  }else{
    $_SESSION['statuss']="Error";
    $_SESSION['status_codes']="error";
  }
}
?>
